<?php

namespace App\Http\Controllers;

use App\Models\LaporKendala;
use App\Models\PinjamRuang;
use Inertia\Inertia;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPeminjamanLab = PinjamRuang::count();
        $totalKendalaLab = LaporKendala::count();

        return Inertia::render('Dashboard', [
            'totalPeminjamanLab' => $totalPeminjamanLab,
            'totalKendalaLab' => $totalKendalaLab
        ]);
    }
}
