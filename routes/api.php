<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

    Route::get('/post', [PostController::class, 'index']);
    Route::post('/post', [PostController::class, 'create']);
?>
