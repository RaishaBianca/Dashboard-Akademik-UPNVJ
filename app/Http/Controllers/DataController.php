<?php
namespace App\Http\Controllers;

use App\Models\JadwalMK;
use App\Models\PinjamRuang;
use App\Models\LaporKendala;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function getAllPeminjaman(Request $request)
    {
        $query = PinjamRuang::with(['user', 'ruangan']);
    
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->whereHas('user', function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                  ->orWhere('id_user', 'like', "%{$search}%");
            })->orWhereHas('ruangan', function ($q) use ($search) {
                $q->where('nama_ruang', 'like', "%{$search}%");
            })->orWhere('keterangan', 'like', "%{$search}%");
        }
    
        $data_pinjam = $query->orderByRaw("CASE WHEN status = 'pending' THEN 0 ELSE 1 END, status")->get()->map(function($pinjam) {
            return [
                'id' => $pinjam->id_pinjam,
                'tanggal' => date('d/m/Y', strtotime($pinjam->tgl_pinjam)),
                'nama' => $pinjam->user->nama,
                'nim' => $pinjam->user->id_user,
                'lab' => $pinjam->ruangan->nama_ruang,
                'keterangan' => $pinjam->keterangan,
                'status' => $pinjam->status,
            ];
        });
    
        return response()->json($data_pinjam);
    }

    public function getAllKendala()
    {
        try {
            $data_kendala = LaporKendala::with(['user', 'ruangan', 'jenis_kendala', 'bentuk_kendala'])
                ->orderByRaw('tgl_lapor DESC')
                ->get()
                ->map(function($kendala) {
                    return [
                        'id' => $kendala->id_lapor,
                        'nama' => $kendala->user->nama,
                        'lab' => $kendala->ruangan->nama_ruang,
                        'jenis_kendala' => $kendala->jenis_kendala->nama_jenis_kendala,
                        'bentuk_kendala' => $kendala->bentuk_kendala->nama_bentuk_kendala,
                        'deskripsi' => $kendala->deskripsi_kendala,
                        'status' => $kendala->status
                    ];
                });
                
            return response()->json($data_kendala);
            
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to fetch data',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function getAllJadwal(){
        return $jadwal = JadwalMK::with(['ruangan', 'matakuliah', 'user'])
            ->orderByRaw('hari ASC, jam_mulai ASC')->whereBetween('jam_mulai', ['07:00:00', '18:00:00'])->whereBetween('jam_selesai', ['07:00:00', '18:00:00'])
            ->get()
            ->map(function($jadwal) {
                return [
                    'id' => $jadwal->id_jadwal,
                    'hari' => $jadwal->hari,
                    'jam_mulai' => $jadwal->jam_mulai,
                    'jam_selesai' => $jadwal->jam_selesai,
                    'matakuliah' => $jadwal->matakuliah->nama_mk,
                    'dosen' => $jadwal->user->nama,
                    'nim' => $jadwal->user->id_user,
                    'ruangan' => $jadwal->ruangan->nama_ruang
                ];
            });
    }
}