<?php

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\Api\ProductsController;
use App\Http\Controllers\MailController;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::controller(AuthController::class)->group(function(){
Route::post('register','register');
Route::post('login','login');
});

Route::resource('products',ProductsController::class)->middleware('auth:sanctum');
Route::post('search',[ProductsController::class,'search'])->middleware('auth:sanctum');

Route::get('sendmail',[MailController::class,'send'])->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
