<?php

namespace App\Http\Controllers;

use App\Http\Resources\PeminjamanResource;
use App\Models\PinjamRuang;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DaftarKonfirmasiController extends Controller
{
    public function index()
    {
        $queryPeminjamanLab = PinjamRuang::with(['user', 'ruangan'])
            ->whereHas('ruangan', function($query) {
                $query->where('tipe_ruang', 'lab');
            })
            ->orderByRaw("CASE WHEN status = 'pending' THEN 0 ELSE 1 END, status")
            ->get();
        $peminjamanRuanganLab = PeminjamanResource::collection($queryPeminjamanLab);

        $queryPeminjamanKelas = PinjamRuang::with(['user', 'ruangan'])
        ->whereHas('ruangan', function($query) {
            $query->where('tipe_ruang', 'kelas');
        })
        ->orderByRaw("CASE WHEN status = 'pending' THEN 0 ELSE 1 END, status")
        ->get();
        $peminjamanRuanganKelas = PeminjamanResource::collection($queryPeminjamanKelas);

        // dd($dataPeminjamanRuangan);
        return Inertia::render('DaftarKonfirmasi/Index', [
            'peminjamanRuangan' => $peminjamanRuanganLab,
            'peminjamanRuanganKelas' => $peminjamanRuanganKelas,
        ]);
    }
}
