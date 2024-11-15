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
        $query = PinjamRuang::with(['user', 'ruangan'])->orderByRaw("CASE WHEN status = 'pending' THEN 0 ELSE 1 END, status")->get();
        $peminjamanRuangan = PeminjamanResource::collection($query);

        // dd($dataPeminjamanRuangan);
        return Inertia::render('DaftarKonfirmasi/Index', [
            'peminjamanRuangan' => $peminjamanRuangan
        ]);
    }
}
