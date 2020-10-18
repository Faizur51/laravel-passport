<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\CategoryController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::middleware('auth:api')->group( function () {

    

});


Route::get('/users',[UserController::class,'index']);

Route::get('/users/{id}',[UserController::class,'show']);

Route::post('/users/store',[UserController::class,'store']);


Route::get('/category',[CategoryController::class,'index']);

Route::get('/category/{id}',[CategoryController::class,'show']);