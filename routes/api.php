<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TranslationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;


Route::apiResources([
    'translations' => TranslationController::class,
    'users' => UserController::class,
    'posts' => PostController::class,
    'tags' => TagController::class
]);