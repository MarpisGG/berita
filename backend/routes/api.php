<?php

use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;


Route::get('/news', [NewsController::class, 'index']);
Route::get('/news/{slug}', [NewsController::class, 'show']);
Route::post('/news', [NewsController::class, 'store']);
