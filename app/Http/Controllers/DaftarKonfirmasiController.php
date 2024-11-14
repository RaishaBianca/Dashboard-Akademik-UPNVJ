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
        $dataPeminjamanRuangan = PinjamRuang::with(['user', 'ruangan'])->get();
        $peminjamanRuangan = PeminjamanResource::collection($dataPeminjamanRuangan)->toJson();

        // dd($dataPeminjamanRuangan);
        return Inertia::render('DaftarKonfirmasi/Index', [
            'peminjamanRuangan' => $peminjamanRuangan
        ]);
    }
}
