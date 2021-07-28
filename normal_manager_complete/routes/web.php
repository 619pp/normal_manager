<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\normalUserController;
use App\Http\Controllers\issueAdd;
use App\Http\Controllers\managerUserController;
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

// for login and registration 
Route::get('login',[LoginController::class,'login']);
Route::get('registration',[LoginController::class,'registration']);
Route::get('forgotpassword',[LoginController::class,'forgotPassword']);
Route::post('register_user',[LoginController::class,'registerUser']);
Route::post('login_user',[LoginController::class,'loginUser']);
route::post('valid',[LoginController::class,'validation']);
Route::get('screen',[LoginController::class,'screen']);

//Uptill here
//Route::post('',[normalUserController::class,'addIssue']);
Route::post('/createIssueNormal', [normalUserController::class,'addIssueNormal']);

Route::get('normal/{emp_id}',[normalUserController::class,'getNormalUser']);
// Route::view('normal','normalUser');

Route::get('normal/editMobileNormalUser/{emp_id}',[normalUserController::class,'UpdateMobileNormalUser']);

Route::post('editMobileNormal',[normalUserController::class,'UpdateNormal']);

// for manager 
Route::get('manager/{emp_id}',[managerUserController::class,'getManagerUser']);

Route::get('manager/editMobile/{emp_id}',[managerUserController::class,'UpdateMobileManager']);

Route::post('editMobileManager',[managerUserController::class,'UpdateManagerMobile']);

Route::post('/create', [managerUserController::class,'addIssue']);
// new to add 

Route::get('manager/deleteRepotee/{emp_id}/{manager_id}',[managerUserController::class,'deleteRepotee']);

Route::get('/displayIssue/{manager_id}',[managerUserController::class,'getIssue']);

Route::get('/addEmployee/{manager_id}',[managerUserController::class,'addEmployee']);

Route::post('/addNewEmployee',[managerUserController::class,'addedEmployee']);


