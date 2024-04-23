<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\SubCommentController;
use App\Http\Controllers\UserAuthController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('register', [UserAuthController::class, 'register']);
Route::post('login', [UserAuthController::class, 'login']);
Route::post('logout', [UserAuthController::class, 'logout'])
    ->middleware('auth:sanctum');

Route::get('comments', [CommentController::class, 'index']);
Route::get('comments/{id}', [CommentController::class, 'show']);
Route::post('comments', [CommentController::class, 'store']);

Route::post('subcomments', [SubCommentController::class, 'store']);

//
Route::delete('comments/{id}', [CommentController::class, 'destroy']);
Route::put('comments/{id}', [CommentController::class, 'update']);

Route::delete('subcomments/{id}', [SubCommentController::class, 'destroy']);
Route::put('subcomments/{id}', [SubCommentController::class, 'update']);
