<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\LaporKendala;
use Illuminate\Http\Request;
use App\Http\Resources\PeminjamanResource;
use App\Http\Resources\LaporanKendalaResource;

class PelaporanKendalaController extends Controller
{
    public function index()
    {
        $query = LaporKendala::with(['user', 'ruangan', 'jenis_kendala', 'bentuk_kendala'])->orderByRaw('tgl_lapor DESC')->get();
        $laporKendala = LaporanKendalaResource::collection($query);
        
        return Inertia::render('PelaporanKendala/Index', [
            'laporanKendala' => $laporKendala
        ]);
    }
}
