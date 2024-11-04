<?php
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\UserController;

Route::inertia('/dashboard', 'Dashboard');
Route::inertia('/daftar-konfirmasi', 'Konfirmasi');
Route::inertia('/jadwal-pemakaian', 'Jadwal');
Route::inertia('/lapor-kendala', 'Kendala');

Route::get('/', function () {
    return Inertia::render('Login');});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/test', [AuthController::class, 'test']);

// Route::middleware('auth')->group(function () {
//     Route::inertia('/dashboard', 'Dashboard')->name('dashboard');
// });


Route::get('/csrf-cookie', function (Request $request) {
    return response()->json([
        'csrf_token' => csrf_token()
    ]);
});

Route::get('/data-peminjaman', [DataController::class, 'getAllPeminjaman'])->name('data.peminjaman');