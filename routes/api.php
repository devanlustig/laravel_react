<?php

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

use App\Http\Controllers\APIController;

Route::get('/getPosts', [APIController::class, 'getPosts']);
Route::apiResource('/posts', App\Http\Controllers\API\PostController::class);
Route::apiResource('/questions', App\Http\Controllers\API\QuestionController::class);
Route::post('/logout', [APIController::class, 'logout']);
Route::post('/login', [APIController::class, 'login']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
