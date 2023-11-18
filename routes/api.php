<?php

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
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user', [AuthController::class, 'user']);
});

Route::apiResource('posts', \App\Http\Controllers\Api\PostController::class)->middleware('jwt');

Route::post('reactions/{post}/react', \App\Http\Controllers\Api\ReactionController::class);

Route::group(['prefix' => 'user'],function (){
    Route::get('/profile/{user:username}', App\Http\Controllers\Api\UserProfileController::class)->middleware('jwt');
    Route::get('/search', \App\Http\Controllers\Api\UserSearchController::class)->middleware('jwt');
    Route::get('/posts/{user:username}', \App\Http\Controllers\Api\UserPostsController::class)->middleware('jwt');
});

Route::post('/follow/{user:username}', \App\Http\Controllers\Api\FollowController::class)->middleware('jwt');
