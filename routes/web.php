<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\UserController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\Bangladesh_bankController;


use App\Http\Controllers\Controllers;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


// Route::post('/user_register', [UserController::class, 'userregister']);
Route::post('/logine', [UserController::class, 'login']);



Route::get('/fdrstatus', [UserController::class, 'fdrstatus']);
Route::POST('/searchfdrstatus', [UserController::class, 'searchfdrstatus']);



Route::get('/clear', function() {
    
    Artisan::call('cache:clear');    
    Artisan::call('config:clear');    
    Artisan::call('config:cache');    
    Artisan::call('view:clear'); 
    Artisan::call('route:clear');
    Artisan::call('event:clear');
    Artisan::call('optimize:clear');
    Artisan::call('auth:clear-resets');
    return "Cleared all caches!";
});


 Route::get('/fdr', [UserController::class, 'userfdr']);
 Route::post('/fdrformsend', [UserController::class, 'fdrformsend']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




// Route::middleware(['auth', 'is_User'])->prefix('user')->group(function () {
//     Route::get('/', [UserController::class, 'userpanal']);
//     Route::get('/fdr', [UserController::class, 'userfdr']);
    
//     Route::post('/fdrformsend', [UserController::class, 'fdrformsend']);
//     Route::get('/fdrformsend', [UserController::class, 'get_fdrformsend']);
// });



Route::middleware(['auth', 'is_Branch'])->prefix('branch')->group(function () {
    Route::get('/', [BranchController::class, 'dashboardpanal']);
    Route::get('/fdrmanage', [BranchController::class, 'branchpanal']);
    
    Route::post('/approve', [BranchController::class, 'approvebranch']);
    Route::get('/views/{id}', [BranchController::class, 'viewdata']);

});


Route::middleware(['auth', 'is_Bank'])->prefix('bank')->group(function () {
    Route::get('/', [BankController::class, 'dashboardpanal']);
    Route::get('/apli_received', [BankController::class, 'bankpanal']);
    Route::get('/bank_branch', [BankController::class, 'bank_branch']);
    Route::post('/approve', [BankController::class, 'approvebank']);
    Route::get('/views/{id}', [BankController::class, 'viewdata']);

    Route::get('/branchregister', [BankController::class, 'branchregister']);    
    Route::post('/addbranchregister', [BankController::class, 'addbranchregister']);
    
    
        // branch account enable /disable 
        // bank and bangladesh bank its route same function start
    Route::get('/status/{id}/{status}', [BankController::class, 'statusdata']);    
        // bank and bangladesh bank its route same function end
});



Route::middleware(['auth', 'is_BangladeshBank'])->prefix('bangladeshBank')->group(function () {
    Route::get('/', [Bangladesh_bankController::class, 'Bangladesh_bankpanal']);
    Route::post('/approve', [Bangladesh_bankController::class, 'approvebdbank']);

    Route::get('/status/{id}/{status}', [Bangladesh_bankController::class, 'bank_statusdata']);    

    Route::get('/views/{id}', [Bangladesh_bankController::class, 'fdrviewdata']);
    Route::get('/banklist', [Bangladesh_bankController::class, 'bnklist']);
    
    
    
// bdbank in all branch list show start
    Route::get('/branchlist', [Bangladesh_bankController::class, 'branchlist']);
// bdbank in all branch list show end


    Route::get('/bankfrom_branch/{userId}', [Bangladesh_bankController::class, 'bankfrom_branch']);

    Route::get('/bankregister', [Bangladesh_bankController::class, 'bankregister']);    
    Route::post('/addbankregister', [Bangladesh_bankController::class, 'addbankregister']);

        // bank and bangladesh bank its route same function start
    Route::get('/status/{id}/{status}', [BankController::class, 'statusdata']);    
        // bank and bangladesh bank its route same function end
});


Route::get('/bdbank', [Bangladesh_bankController::class, 'bdbank']);