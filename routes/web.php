<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminMain\AdminLoginController;
use App\Http\Controllers\HomeController;
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
// strat admin Routes
//admin login view page raouting
Route::get('admin-welcome-jobportal',[AdminLoginController::class,'adminLloginViewpage'])->middleware('isLoinDashboard');
Route::get('/dashboard',[AdminLoginController::class,'checkAdminLoigin'])->middleware('isLogged');
Route::post('/loginAdmin',[AdminLoginController::class,'loginAdmin']);
Route::get('/logout',[AdminLoginController::class,'flush'])->name('logout');
Route::get('/fetchDataPresanalDetails',[AdminLoginController::class,'fetchDataPresanalDetails']);
Route::get('/edit_user/{id}',[AdminLoginController::class,'edit_user']);
Route::get('/update_user/{id}',[AdminLoginController::class,'update_user']);
Route::get('/create_post',[AdminLoginController::class,'storedata']);
Route::get('/delete_user/{id}',[AdminLoginController::class,'delete_user']);
// end admin Routes

// home page route
Route::get('/',[HomeController::class,'homepage']);
