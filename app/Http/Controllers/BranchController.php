<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Fdr_model;
use App\Models\Bankdatamodel;
use App\Models\Branchdatamodel;

class BranchController extends Controller{
    //

    // 

    public function dashboardpanal(){ 
        return view('branch.branchdash');
    }



    public function branchpanal(){        
        // $data = Fdr_model::all();
        
            // $user_id = Auth::id();
            // $data = Fdr_model::with(['bankdatamodel', 'branchdatamodel'])
            //     ->whereHas('branchdatamodel', function ($query) use ($user_id) {
            //         $query->where('user_id', $user_id);
            //     })->get();

            $auth_user_id = Auth::id();;

            $data = DB::select("
                SELECT fdr_models.*, fdr_models.id as fd_id, bankdatamodels.*, branchdatamodels.*, users.name, users.email as authemail, users.name as auth_name, users.is_active as auth_status 
                FROM fdr_models
                LEFT JOIN bankdatamodels ON fdr_models.aply_bank_id = bankdatamodels.id
                LEFT JOIN branchdatamodels ON fdr_models.aply_branch_id = branchdatamodels.id
                LEFT JOIN users ON branchdatamodels.user_id = users.id 
                WHERE branchdatamodels.user_id = $auth_user_id
            ");

        return view('branch.branch', ['data' => $data]);      
    }




    public function approvebranch(Request $request){
        try{
            $affectedRows = Fdr_model::where('id', $request->id)->update(['banch_id' => auth()->user()->id, 'branch_verifyed' => $request->Approve, 'branch_comment' => $request->commend]);
            // return redirect('/branch')->with('add_success', 'save successfully');
            return redirect()->back();
        }
        catch (\PDOException $e) {
            // return redirect('/branch')->with('add_success', 'save successfully');   
            return redirect()->back();
        }        
    }

    


    public function viewdata($id){        
        $data = Fdr_model::find($id);
        return view('branch.view', ['data' => $data]);
    }


    
}