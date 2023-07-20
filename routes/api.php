<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AuthJWT;
use App\Http\Middleware\ValidEmail;
use Illuminate\Support\Facades\Route;


Route::post('/login', [LoginController::class, 'index']);

Route::middleware([AuthJWT::class])->apiResource('/users', UserController::class);
Route::middleware([ValidEmail::class])->post('/users', [UserController::class, 'store']);
