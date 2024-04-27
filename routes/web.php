<?php

use App\Http\Controllers\SmsController;
use App\Http\Controllers\SocialController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('auth/google',[SocialController::class,'redirectToGoogle']);
Route::get('auth/google/callback',[SocialController::class,'googleCallback']);
Route::get('auth/facebook',[SocialController::class,'redirectToFacebook']);
Route::get('auth/facebook/callback',[SocialController::class,'facebookCallback']);
Route::get('sms',[SmsController::class,'send']);

