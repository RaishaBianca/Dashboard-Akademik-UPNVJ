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
            $search = strtolower($request->input('search'));
            $query->whereHas('user', function ($q) use ($search) {
                $q->whereRaw('LOWER(nama) LIKE ?', ['%' . $search . '%'])
                  ->orWhere('id_user', 'like', "%{$search}%");
            })->orWhereHas('ruangan', function ($q) use ($search) {
                $q->whereRaw('LOWER(nama_ruang) LIKE ?', ['%' . $search . '%']);
            })->orWhereRaw('LOWER(keterangan) LIKE ?', ['%' . $search . '%']);
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

    public function getAllKendala(Request $request)
    {
        $query = LaporKendala::with(['user', 'ruangan', 'jenis_kendala', 'bentuk_kendala']);
    
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->whereHas('user', function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                  ->orWhere('id_user', 'like', "%{$search}%");
            })->orWhereHas('ruangan', function ($q) use ($search) {
                $q->where('nama_ruang', 'like', "%{$search}%");
            })->orWhereHas('jenis_kendala', function ($q) use ($search) {
                $q->where('nama_jenis_kendala', 'like', "%{$search}%");
            })->orWhereHas('bentuk_kendala', function ($q) use ($search) {
                $q->where('nama_bentuk_kendala', 'like', "%{$search}%");
            })->orWhere('deskripsi_kendala', 'like', "%{$search}%")
              ->orWhere('status', 'like', "%{$search}%")
              ->orWhere('id_lapor', 'like', "%{$search}%");
        }
    
        $data_kendala = $query->orderByRaw('tgl_lapor DESC')->get()->map(function($kendala) {
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

    public function getAllStats (){
        $data = [
            'total_peminjaman' => PinjamRuang::count(),
            'total_kendala' => LaporKendala::count(),
        ];
        return response()->json($data);
    }
}