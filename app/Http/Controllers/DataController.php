<?php
namespace App\Http\Controllers;

use App\Models\PinjamRuang;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function getAllPeminjaman()
    {
        try {
            $data_pinjam = PinjamRuang::with(['user', 'ruangan'])
                ->orderByRaw('tgl_pinjam DESC')
                ->get()
                ->map(function($pinjam) {
                    return [
                        'id' => $pinjam->id_pinjam,
                        'tanggal' => date('d/m/Y', strtotime($pinjam->tgl_pinjam)),
                        'nama' => $pinjam->user->nama,
                        'nim' => $pinjam->user->id_user,
                        'lab' => $pinjam->ruangan->nama_ruang,
                        'keterangan' => $pinjam->keterangan,
                        'status' => $pinjam->status
                    ];
                });
                
            return response()->json($data_pinjam);
            
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to fetch data',
                'message' => $e->getMessage()
            ], 500);
        }
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
}