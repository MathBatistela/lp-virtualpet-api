<?php

use App\Http\Controllers\VPetController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\UserController;

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::get('/user', [UserController::class, 'index']);
Route::get('user/{id}',[UserController::class, 'show']);
Route::put('user/{id}',[UserController::class, 'update']);
Route::delete('user/{id}',[UserController::class, 'destroy']);
Route::post('/vpet', [VPetController::class, 'store']);
Route::get('/vpet', [VPetController::class, 'index']);
Route::get('vpet/{id}',[VPetController::class, 'show']);
Route::put('vpet/{id}',[VPetController::class, 'update']);
Route::delete('vpet/{id}',[VPetController::class, 'destroy']);