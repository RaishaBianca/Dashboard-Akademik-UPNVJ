<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Inertia\Inertia;
use App\Models\PinjamRuang;
use App\Models\LaporKendala;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatistikController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('minggu')){
            $year = substr($request->minggu, 0, 4);
            $week = substr($request->minggu, -2);
            
            $startOfWeek = Carbon::parse($year . 'W' . $week . '1')->startOfWeek();
            $endOfWeek = Carbon::parse($year . 'W' . $week . '5')->endOfWeek();
        } else {
            $startOfWeek = now()->startOfWeek(); // Senin
            $endOfWeek = now()->endOfWeek()->subDays(2); // Jumat
        }
        
        $pinjamRuang = PinjamRuang::whereBetween('tgl_pinjam', [$startOfWeek, $endOfWeek])
            ->groupBy(DB::raw('DATE(tgl_pinjam)'))
            ->selectRaw('DATE(tgl_pinjam) as tanggal, COUNT(*) as total')
            ->orderBy('tanggal')
            ->pluck('total')
            ->toArray();

        $laporKendala = LaporKendala::whereBetween('tgl_lapor', [$startOfWeek, $endOfWeek])
            ->groupBy(DB::raw('DATE(tgl_lapor)'))
            ->selectRaw('DATE(tgl_lapor) as tanggal, COUNT(*) as total')
            ->orderBy('tanggal')
            ->pluck('total')
            ->toArray();
    
        return Inertia::render('Statistik/Index', [
            'dataPeminjaman' => $pinjamRuang,
            'dataKendala' => $laporKendala
        ]);
    }
}
