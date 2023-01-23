<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

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

Route::get('/login',[UserController::class,'viewlogin'])->name('login')->middleware('guest');
Route::get('/logout',[UserController::class,'logout'])->middleware('auth');
Route::get('/register',[UserController::class,'viewRegister'])->middleware('guest');
Route::get('/dashboard/profile/edituser',[UserController::class,'index'])->name('edit')->middleware('auth');
Route::get('/addlist/{Talent}',[UserController::class,'addlist'])->name('addlist');
Route::get('/delete/{Talent}',[UserController::class,'delete'])->name('deletelist');

Route::put('/dashboard/profile/{id}',[UserController::class,'update'])->name('edituser')->middleware('auth');
Route::POST('/login',[UserController::class,'login']);
Route::POST('/register',[UserController::class,'register']);


Route::get('/dashboard',[HomeController::class,'dashboard'])->middleware('auth');
Route::get('/dashboard/profile',[HomeController::class,'profile'])->name('Profile')->middleware('auth');
Route::get('/wishlist',[HomeController::class,'wishlist'])->middleware('auth');
Route::get('/aboutUs',[HomeController::class,'aboutUs']);



Route::get('/admin',[adminController::class,'index'])->name('HalamanAdmin')->middleware('auth')->middleware('can:viewAny,Talents');
Route::get('/deleteTalent/{Talent}',[adminController::class,'delete']);
Route::get('/admin{Talent}',[adminController::class,'edit']);
Route::Put('addOrupdateTalent',[adminController::class,'addOrupdate']);


