<?php

namespace App\Http\Controllers;

use App\Models\PinjamRuang;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Inertia\Inertia;

class JadwalPemakaianController extends Controller
{
    public function index() 
    {
        $query = PinjamRuang::with('ruangan', 'user')
            ->where('status', 'approved')
            ->get();
        
        $jadwalPemakaian = $query->map(function ($item) {
            return [
                'title' => $item->user->nama .' - '. $item->ruangan->nama_ruang,
                'start' => Carbon::parse($item->tgl_pinjam)->format('Y-m-d').'T'.$item->jam_mulai,
                'end' => Carbon::parse($item->tgl_pinjam)->format('Y-m-d').'T'.$item->jam_selesai,
            ];
        });

        return Inertia::render('JadwalPemakaian/Index', [
            'jadwalPemakaian' => $jadwalPemakaian
        ]);
    }
}
