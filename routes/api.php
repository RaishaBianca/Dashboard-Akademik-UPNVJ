<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/users', [UserController::class, 'getAllUsers']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/sign_up', [UserController::class, 'sign_up']);
Route::get('/user/{nim}', [UserController::class, 'getUser']);
