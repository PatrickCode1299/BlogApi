<?php
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BlogPostController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\TokenAuthMiddleware;


Route::middleware(TokenAuthMiddleware::class)->group(function () {


    Route::get('/blogs', [BlogController::class, 'index']);
    Route::post('/blogs', [BlogController::class, 'store']);
    Route::get('/blogs/{id}', [BlogController::class, 'show']);
    Route::put('/blogs/{id}', [BlogController::class, 'update']);
    Route::delete('/blogs/{id}', [BlogController::class, 'destroy']);


    Route::get('/blogs/{blog_id}/posts', [BlogPostController::class, 'index']);
    Route::post('/blogs/{blog_id}/posts', [BlogPostController::class, 'store']);
    Route::get('/blogs/{blog_id}/posts/{id}', [BlogPostController::class, 'show']);
    Route::put('/blogs/{blog_id}/posts/{id}', [BlogPostController::class, 'update']);
    Route::delete('/blogs/{blog_id}/posts/{id}', [BlogPostController::class, 'destroy']);

    Route::post('/posts/{id}/like', [BlogPostController::class, 'like']);
    Route::post('/posts/{id}/comment', [BlogPostController::class, 'comment']);
});
