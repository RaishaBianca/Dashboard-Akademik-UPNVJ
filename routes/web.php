<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StatistikController;
use App\Http\Controllers\JadwalPemakaianController;
use App\Http\Controllers\DaftarKonfirmasiController;
use App\Http\Controllers\PelaporanKendalaController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

// Route::get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/', [AuthenticatedSessionController::class, 'create'])
    ->name('login');

Route::post('login', [AuthenticatedSessionController::class, 'store'])
    ->name('post.login');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/daftar-konfirmasi', [DaftarKonfirmasiController::class, 'index'])->name('daftar-konfirmasi.index');
    Route::get('/lapor-kendala', [PelaporanKendalaController::class, 'index'])->name('lapor-kendala.index');
    Route::get('/statistik', [StatistikController::class, 'index'])->name('statistik.index');
    Route::get('/jadwal-pemakaian', [JadwalPemakaianController::class, 'index'])->name('jadwal-pemakaian.index');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');
});

// require __DIR__.'/auth.php';
