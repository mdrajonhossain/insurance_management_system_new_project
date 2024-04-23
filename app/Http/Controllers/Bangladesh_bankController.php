<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Fdr_model;
use App\Models\Bankdatamodel;
use App\Models\Branchdatamodel;
use App\Models\VerifiedserviceId;


use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;


class Bangladesh_bankController extends Controller
{
    //
    public function Bangladesh_bankpanal(){        
        

        $data = DB::select("
        SELECT fdr_models.*, fdr_models.id as fd_id, bankdatamodels.*, branchdatamodels.*, users.id as update_id, users.name as auth_name, users.email as authemail, users.is_active as auth_status
        FROM fdr_models
        LEFT JOIN bankdatamodels ON fdr_models.aply_bank_id = bankdatamodels.id
        LEFT JOIN branchdatamodels ON fdr_models.aply_branch_id = branchdatamodels.id
        LEFT JOIN users ON bankdatamodels.user_id = users.id");
       
        

        return view('bangladeshbank.bangladeshbank', ['data' => $data]);        
    }

     


    public function approvebdbank(Request $request){
        try {
            $dataee = Fdr_model::find($request->id);

            // $randomgenerateor = rand(10547, 999999900);

            
            $service_search_id = $dataee->search_id;
            $final_generate = $request->id . '.' . $dataee->aply_branch_id . '.' . $dataee->aply_bank_id;
    
            $affectedRows = Fdr_model::where('id', $request->id)->update([
                'bdbank_verifyed' => $request->Approve,
                'bdbank_comment' => $request->commend
            ]);
    
            if ($affectedRows > 0) {
                $gener = new VerifiedserviceId;
                $gener->service_genid = $service_search_id;
                $gener->verifygenid = $final_generate; // Fixed typo here
    
                $gener->save();
                return redirect()->back();
            } else {
                return redirect()->back();
            }
        } catch (\PDOException $e) {
            // Handle specific PDO exceptions or log the error
            return redirect()->back();
        }
    }







    public function fdrviewdata($id){          
        $data = Fdr_model::find($id);
        return view('bangladeshbank.viewpage', ['data' => $data]);
    }


    public function bnklist(){
        // $data = Bankdatamodel::all();
        $data = DB::table('users')
        ->select('bankdatamodels.id as bank_id', 'bankdatamodels.bank_name', 'users.gen_id as gen_id', 'users.id as userId', 'users.name', 'users.email', 'users.usertype', 'users.is_active',)
        ->leftJoin('bankdatamodels', 'bankdatamodels.user_id', '=', 'users.id')
        ->where('users.usertype', '=', 1)
        ->get();        
        
        return view('bangladeshbank.banklist', ['data' => $data]);
    }


    public function branchlist(){
        // $branchlist = Branchdatamodel::all();

        $data = DB::table('branchdatamodels')
        ->select('branchdatamodels.*','bankdatamodels.bank_name as bank_name', 'users.email as email','users.name as userName','users.is_active as is_active')
        ->leftJoin('bankdatamodels', 'bankdatamodels.id', '=', 'branchdatamodels.bank_id')
        ->leftJoin('users', 'users.id', '=', 'branchdatamodels.user_id')->get();    

        return view('bangladeshbank.branch_list', ['data'=> $data]);
    }




    public function bankfrom_branch($userId){ 
       
        $data = DB::table('branchdatamodels')
            ->select('branchdatamodels.*', 'bankdatamodels.*', 'users.id as userId','users.name as username', 'users.email as user_email', 'users.is_active')   
            ->leftJoin('bankdatamodels', 'branchdatamodels.bank_id', '=', 'bankdatamodels.id')
            ->leftJoin('users', 'branchdatamodels.user_id', '=', 'users.id')
            ->where('bankdatamodels.user_id', $userId)
            ->get();

        
        return view('bangladeshbank.bankfrombranch', ['data' => $data]);
    }



    public function bdbank(){
        try {
            $pass = "rajon123456";
    
            $user = User::create([
                'name' => "bdbank",
                'email' => "bdbank@gmail.com",
                'password' => bcrypt($pass),
                'gen_id' => '00',            
                'usertype' => 2,
            ]);
                
            $user->gen_id = '00' . $user->id;            
            $user->is_active = '1';        
            $user->save();
                    
            if ($user->usertype === 2) {
                return redirect('/bangladeshBank');
            } else {
                return redirect('/');
            }
        } catch (\PDOException $e) {                        
            return redirect('/login')->with('error', 'Database error occurred.');
        } catch (\Exception $e) {                        
            Log::error($e->getMessage());            
            return redirect('/error')->with('error', 'An unexpected error occurred. Please try again later.');
        }
    }


    // bank account enable /disable   
    public function bank_statusdata($id, $is_active){                 
        try{
            $affectedRows = User::where('id', $id)->update(['is_active' => $is_active]);
            // return redirect('/bank')->with('add_success', 'save successfully');   
            return redirect()->back();
        }
        catch (\PDOException $e) {
            // return redirect('/bank')->with('add_success', 'save successfully');   
            return redirect()->back();
        }        
    }


    public function bankregister(){                
        return view('bangladeshbank.bank_register');
    }



    public function addbankregister(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'usertype' => 'required|string',
        ]);
    
        if ($validator->fails()) {
            // return redirect()->back();            
            return redirect('/bangladeshBank/bankregister')->with('register_error', 'Register faild');   
        }
    
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'gen_id' => '00',
            'usertype' => $request->usertype,
        ]);

        $user->gen_id = auth()->user()->gen_id . '-' . '00' . $user->id;
        $user->save();
    
        if ($user) {            
            if ($user->usertype === '0') {
                Branchdatamodel::create([
                    'bank_id' => $request->bankid,
                    'branch_name' => $request->branch_name,
                    'user_id' => $user->id,
                ]);                
                // return redirect()->back();                                
            } elseif ($user->usertype === '1') {
                Bankdatamodel::create([
                    'user_id' => $user->id,
                    'bank_name' => $request->bank_name,
                ]);
                // return redirect()->back();                
                return redirect('/bangladeshBank/bankregister')->with('register_success', 'Register successfully');   
            }
        } else {
            // Handle user creation failure
            // Log error or return error message
        }
    }



}