<?php

use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\V2\PostController as V2PostController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
  return $request->user();
});


Route::group(['middleware' => ['auth:sanctum'], 'prefix' => 'v1'], function () {
  Route::apiResource('posts', PostController::class);
});

Route::group(['middleware' => ['auth:sanctum'], 'prefix' => 'v2'], function () {
  Route::apiResource('posts', V2PostController::class);
});

Route::apiResource('v1/posts', PostController::class)->only(['index', 'show']);

Route::apiResource('v2/posts', V2PostController::class)->only(['index', 'show']);

Route::post('login', [LoginController::class, 'login']);
