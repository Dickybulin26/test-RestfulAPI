<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthenticationController;

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

Route::get('/posts/{id}', [PostController::class, 'show'])->name('detail.posts');

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/logout', [AuthenticationController::class, 'logout']);
    Route::get('/dataUser', [AuthenticationController::class, 'dataUser']);
    Route::post('/posts', [PostController::class,'store']);
    Route::post('/posts-updated/{id}', [PostController::class,'ganti']); #->middleware('owner-post');
    Route::delete('posts/{id}',  [PostController::class,'destroy']); #->middleware('owner-post');

    // Route::post('/comment', [CommentController::class, 'store']);
});


Route::get('/posts', [PostController::class, 'index']);


// middleware login
Route::post('/login', [AuthenticationController::class, 'login']);