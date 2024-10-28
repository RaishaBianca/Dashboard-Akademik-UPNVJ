<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

Route::get('/users', [ApiController::class, 'getAllUsers']);
Route::post('/login', [ApiController::class, 'login']);
Route::post('/sign_up', [ApiController::class, 'sign_up']);
Route::get('/user/{nim}', [ApiController::class, 'getUser']);
