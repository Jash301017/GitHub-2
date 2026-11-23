<?php

use App\Http\Controllers\Api\ArticleApiController;
use Illuminate\Support\Facades\Route;

Route::get('/articles', [ArticleApiController::class, 'index'])->name('api.articles.index');
Route::get('/articles/{article}', [ArticleApiController::class, 'show'])->name('api.articles.show');
