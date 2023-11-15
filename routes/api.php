<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;

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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::group([
    'prefix' => 'auth'
], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
});

Route::apiResource('post', \App\Http\Controllers\Api\PostController::class)->middleware('jwt');
Route::post('follow/{user:username}', \App\Http\Controllers\Api\FollowController::class)->middleware('jwt');


Route::group(['prefix' => 'user'],function (){
    Route::get('/profile', [AuthController::class, 'userProfile']);
    Route::get('/search', \App\Http\Controllers\Api\UserSearchController::class)->middleware('jwt');
});
