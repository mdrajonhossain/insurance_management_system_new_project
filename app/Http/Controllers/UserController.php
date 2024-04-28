<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Mail;
use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Facades\Auth;
use App\Models\Fdr_model;
use App\Models\Bankdatamodel;
use App\Models\Branchdatamodel;
use Illuminate\Support\Facades\DB;
use App\Models\VerifiedserviceId;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;





class UserController extends Controller{


    // public function userRegister(Request $request) {
    //     $validator = Validator::make($request->all(), [
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|string|email|max:255|unique:users',
    //         'password' => 'required|string|min:6|confirmed',
    //         'usertype' => 'required|string',
    //     ]);
    
    //     if ($validator->fails()) {
    //         return redirect('/register')->withErrors($validator)->withInput();
    //     }
    
    //     $user = User::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => bcrypt($request->password),
    //         'usertype' => $request->usertype,
    //     ]);
    
    //     if ($user) {
    //         Auth::login($user);
    //         if ($user->usertype === '0') {
    //             Branchdatamodel::create([
    //                 'bank_id' => $request->bankid,
    //                 'branch_name' => $request->branch_name,
    //                 'user_id' => $user->id,
    //             ]);
    //             return redirect('/branch');
    //         } elseif ($user->usertype === '1') {
    //             Bankdatamodel::create([
    //                 'user_id' => $user->id,
    //                 'bank_name' => $request->bank_name,
    //             ]);
    //             return redirect('/bank');
    //         }
    //     } else {
    //         // Handle user creation failure
    //         // Log error or return error message
    //     }
    // }


    public function login(Request $request) {
        $credentials = $request->only('email', 'password');

        // Attempt to authenticate user
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            $user = Auth::user();
            
            // Check if the user is disabled
            if ($user->is_active == '0') {
                // Log out the user and redirect to login page with error message
                Auth::logout();
                return redirect('/login')->with('error', 'Your account is blocked. Please contact support for assistance.');
            }
            
            // Redirect user based on their usertype
            if ($user->usertype === '0') {
                return redirect('/branch');
            } elseif ($user->usertype === '1') {
                return redirect('/bank');            
            } elseif ($user->usertype === '2') {
                return redirect('/bangladeshBank');
            } else {
                return redirect('/');
            }
        } else {
            // Redirect to login page with error message for invalid credentials
            return redirect('/login')->with('error', 'Invalid credentials');
        }
    }

    
    public function searchfdrstatus(Request $request){
        $requestData = $request->all();


        // function decryptText($encrypted, $key) {
        //     $decrypted = openssl_decrypt(base64_decode($encrypted), 'aes-256-cbc', $key, 0, '1234567890123456');
        //     return $decrypted;
        // }
        // $decryptedText = decryptText($request->aply_id, "secret_key");
        // $words = explode(".", $decryptedText);
        // $index1 = $words[0];
        // $number = intval($index1);

        // dd($number);
        


        if(!$requestData){
            return redirect('/fdrstatus');
        }



        $finalgerrate_id = VerifiedserviceId::where('service_genid', $request->aply_id)->first();        
        // $data = Fdr_model::where('search_id', 'LIKE', "%$request->aply_id%")->get();        
        $data = Fdr_model::where('search_id', 'LIKE', "%$request->aply_id%")->orWhere('email', 'LIKE', "%$request->aply_id%")->orWhere('phone', 'LIKE', "%$request->aply_id%")->get();

        if ($data->isEmpty()) {            
            return redirect('/fdrstatus');
        }

        $bdbank_generateId = $finalgerrate_id ? $finalgerrate_id->verifygenid : null;


        $searchid = Fdr_model::where('email', $request->aply_id)->orWhere('phone', $request->aply_id)->orWhere('search_id', $request->aply_id)->first();
        

        
        return view('userview', ['data' => $data, 'bdbank_generateId' => $bdbank_generateId, 'search_id' => $searchid->search_id]);
    }
  
  
    public function fdrstatus(){        
        return view('fdrstatus');  
    }



    //
    public function userpanal(){        
        return view('user.user');  
    }


    public function userfdr(){        
        return view('fdr');  
    }


    public function fdrformsend(Request $request) {
        try {
            // Find the branch data
            $branch = Branchdatamodel::find($request->branchid);
    
            // Find the user associated with the branch
            $user = User::find($branch->user_id);
    
            // Generate a random search ID
            $randomNumber = rand(10547, 971264700);
    
            // Create the FDR entry
            $fdrmodel = Fdr_model::create([
                'name' => $request->name,
                'search_id' => $randomNumber,
                'phone' => $request->mobile_number,
                'email' => $request->email,
                'etin' => $request->etin,
                'nid' => $request->nid_number,
                'nomonee_name' => $request->nominee_name,
                'nomonee_phone' => $request->nominee_number,
                'nomonee_relation' => $request->relation,
                'nomonee_nid' => $request->nominee_nid,
                'nomonee_etin' => $request->nominee_etin,
                'service_name' => $request->service_name,
                'post_code' => $request->code,
                'district' => $request->district,
                'state' => $request->state,
                'aply_bank_id' => $request->bankid,
                'genarate_id' => '', // Initialize with empty string
                'aply_branch_id' => $request->branchid
            ]);
    
            // Generate the unique identifier and save it
            $fdrmodel->genarate_id = $user->gen_id . '-' . '00' . $fdrmodel->id;
            $fdrmodel->save();
    
            // Redirect to FDR status page
            return redirect('/fdrstatus');
        } catch (\PDOException $e) {
            // If there's an exception, redirect back to the FDR form with a message
            return redirect('/fdr')->with('quick_add_success', 'Quick save failed. Please try again.');
        }
    }


    public function get_fdrformsend(){        
        return view('user.fdr_manage');  
    }





    public function getbranch($id){  
        $branchlist = Branchdatamodel::where('bank_id', $id)->get();     
        return response()->json(['satus' => true, 'branch'=> $branchlist], 201); 
    }


    // public function testapi(){        
    //     $users = Fdr_model::with(['bankdatamodel', 'branchdatamodel'])->get();        
    //     return response()->json(['satus' => $users], 201);
    // }


    public function testapieee(){        
        // $data = Fdr_model::with(['bankdatamodel', 'branchdatamodel','user'])->get();
        // $auth_user_id = Auth::id();
        $auth_user_id = 2;

        $data = DB::select("
            SELECT fdr_models.*, bankdatamodels.*, branchdatamodels.*, users.name, users.email as authemail, users.name as auth_name, users.is_active as auth_status 
            FROM fdr_models
            LEFT JOIN bankdatamodels ON fdr_models.aply_bank_id = bankdatamodels.id
            LEFT JOIN branchdatamodels ON fdr_models.aply_branch_id = branchdatamodels.id
            LEFT JOIN users ON branchdatamodels.user_id = users.id 
            WHERE branchdatamodels.user_id = $auth_user_id
        ");

        return response()->json(['satus' => $data], 201);
    }

    public function testApiCheck(Request $request) {
        return response()->json(['status' => $request->all() ], 201);
    }

    



    public function sendmail() {
        
        $data = ['name' => "Vishal", 'data' => "Hello Vishal"];
        $user['to'] = "mottaleb.jebon@gmail.com";

        try {
            Mail::send('mail', $data, function($message) use ($user) {
                $message->to($user['to']);
                $message->subject('Hello Dev');
            });
            echo "Email sent successfully!";
        } catch (\Exception $e) {
            echo "Failed to send email: " . $e->getMessage();
        }

        
    }




}