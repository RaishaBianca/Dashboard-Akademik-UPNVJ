<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

// user
Route::get('/ruangan', [ApiController::class, 'getRuangan']);
Route::get('/user/{nim}', [ApiController::class, 'getUser']);
Route::get('/ruangan/{id}', [ApiController::class, 'getRuanganById']);
Route::get('/riwayat_peminjaman/{nim}', [ApiController::class, 'getRiwayatPeminjaman']);
Route::get('/riwayat_kendala/{nim}', [ApiController::class, 'getRiwayatKendala']);
Route::get('/detail_peminjaman/{id}', [ApiController::class, 'getPeminjamanById']);
Route::get('/detail_kendala/{id}', [ApiController::class, 'getKendalaById']);


//accepts email, password
Route::post('/login', [ApiController::class, 'login']);
//accepts nama, nim, no_tlp, email, password
Route::post('/sign_up', [ApiController::class, 'sign_up']);
//accepts nim, id_ruang, tgl_pinjam, jam_mulai, jam_selesai, keterangan,
Route::post('/peminjaman', [ApiController::class, 'createPeminjaman']);
//accepts nim, id_ruang, status, id_jenis_kendala, id_bentuk_kendala, deskripsi_kendala
Route::post('/pelaporan_kendala', [ApiController::class, 'createPelaporanKendala']);
//accepts id_ruang, tgl_pinjam, jam_mulai, jam_selesai
Route::post('/ketersediaan-ruangan', [ApiController::class, 'cekKetersediaanRuangan']);


//admin

Route::get('/admin/peminjaman', [ApiController::class, 'getAllPeminjaman']);
Route::get('/admin/kendala', [ApiController::class, 'getAllKendala']);

//accepts login admin 
Route::post('/admin/login', [ApiController::class, 'loginAdmin']);
Route::post('/admin/verifikasi_peminjaman', [ApiController::class, 'verifikasiPeminjaman']);
Route::post('/admin/verifikasi_kendala', [ApiController::class, 'verifikasiKendala']);
Route::get('/admin/jadwal', [ApiController::class, 'getJadwal']);