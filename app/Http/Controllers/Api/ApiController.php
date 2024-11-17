<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Admin;
use App\Models\Ruangan;
use Inertia\Controller;
use App\Models\JadwalMK;

use App\Models\MataKuliah;
use App\Models\PinjamRuang;
use App\Models\LaporKendala;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{

    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first(); //consider creating an option to login with nim

        if ($user && Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Login successful'], 200);
        }

        return response()->json(['message' => 'Login failed'], 404);
    }

    public function sign_up(Request $request)
    {
        $user = new User();
        $user->id_user = $request->nim;
        $user->nama = $request->nama;
        $user->no_tlp = $request->no_tlp; 
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->id_peran = $request->id_peran; 
        if($request->prodi == '0'){
            $user->prodi = 'S1 Informatika';
        }else if($request->prodi == '1'){
            $user->prodi = 'S1 Sistem Informasi';
        }else if($request->prodi == '2'){
            $user->prodi = 'D3 Teknik Komputer';
        }
        else if($request->prodi == '3'){
            $user->prodi = 'S1 Data Sains';
        }
        $user->dibuat_pada = now(); 
        $user->dimodif_pada = now();
        $user->save();

        return response()->json(['message' => 'User created', 'user_id'=>$user->id_user], 200);
    }

    public function getUser(Request $request)
    {
        $nim = $request->nim;
        $user = User::where('id_user', $nim)->first()->makeHidden(['password', 'id_peran','dibuat_pada', 'dimodif_pada']);

        if ($user) {
            return response()->json($user, 200);
        }
    
        return response()->json(['message' => 'User not found'], 404);
    }

    public function getAdmin(Request $request)
    {
        $id = $request->id;
        // $admin = Admin::where('id_admin', $id)->first();
        $admin = User::with('peran')->where('id_user', $id)->first();

        if ($admin) {
           return $formattedAdmin = [
                'id_admin' => $admin->id_user,
                'nama' => $admin->nama,
                'email' => $admin->email
            ];
        }
    
        return response()->json(['message' => 'Admin not found'], 404);
    }

    public function getRuangan(){
        $ruangan = Ruangan::all()->map(function($ruangan){
            return [
                'id_ruangan' => $ruangan->id_ruang,
                'gedung'=> $ruangan->gedung->nama_gedung,
                'nama_ruangan' => $ruangan->nama_ruang,
                'jam_buka' => $ruangan->jam_buka,
                'jam_tutup' => $ruangan->jam_tutup,
                'kapasitas' => $ruangan->kapasitas,
            ];
        });
        return response()->json($ruangan, 200);
    }

    public function getRuanganById(Request $request){
        $id = $request->id;
        $ruangan = Ruangan::where('id_ruang', $id)->first();

        if ($ruangan) {
            return response()->json($ruangan, 200);
        }
    
        return response()->json(['message' => 'Ruangan not found'], 404);
    }

    public function getRiwayatPeminjaman(Request $request){
        $nim = $request->nim;
        $user = User::where('id_user', $nim)->first();
        $riwayat = $user->peminjaman()->get()->map(function($peminjaman){
            return [
                'id_peminjaman' => $peminjaman->id_pinjam,
                'id_ruangan' => $peminjaman->id_ruang,
                'nama_ruangan' => $peminjaman->ruangan->nama_ruang,
                'tanggal' => $peminjaman->tgl_pinjam,
                'jam_mulai' => $peminjaman->jam_mulai,
                'jam_selesai' => $peminjaman->jam_selesai,
                'status' => $peminjaman->status,
            ];
        });
        return response()->json($riwayat, 200);
    }

    public function createPeminjaman(Request $request){
        $peminjaman = new PinjamRuang();
        $peminjaman->id_ruang = $request->id_ruang;
        $peminjaman->id_user = $request->nim;
        $peminjaman->tgl_pinjam = $request->tgl_pinjam;
        $peminjaman->jam_mulai = $request->jam_mulai;
        $peminjaman->jam_selesai = $request->jam_selesai;
        $peminjaman->keterangan = $request->keterangan;
        $peminjaman->jumlah_orang = $request->jumlah_orang;
        $peminjaman->status = 'pending';
        $peminjaman->save();
        
        return response()->json(['message' => 'Peminjaman created', 'peminjaman_id'=>$peminjaman->id_pinjam], 200);
    }

    public function loginAdmin(Request $request)
    {
        // $user = Admin::where('email', $request->email)->first(); 
        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Login successful',
                'id_admin' => $user->id_user,
                'token' => ''//token,
            ], 200);
        }

        return response()->json(['message' => 'Login failed'], 404);
    }

    public function createPelaporanKendala(Request $request){
        $kendala = new LaporKendala();
        $kendala->tgl_lapor = now();
        $kendala->id_user = $request->nim;
        $kendala->id_ruang = $request->id_ruang;
        $kendala->id_jenis_kendala = $request->id_jenis_kendala;
        $kendala->id_bentuk_kendala = $request->id_bentuk_kendala;
        $kendala->deskripsi_kendala = $request->deskripsi_kendala;
        $kendala->status = 'pending';
        $kendala->save();
        
        return response()->json(['message' => 'Kendala reported', 'kendala_id'=>$kendala->id_lapor], 200);
    }

    public function getRiwayatKendala(Request $request){
        $nim = $request->nim;
        $user = User::where('id_user', $nim)->first();
        return $user;
        $riwayat = $user->kendala()->get()->map(function($kendala){
            return [
                'id_kendala' => $kendala->id_lapor,
                'id_ruangan' => $kendala->id_ruang,
                'nama_ruangan' => $kendala->ruangan->nama_ruang,
                'tanggal' => $kendala->tgl_lapor,
                'status' => $kendala->status,
            ];
        });
        return response()->json($riwayat, 200);
    }

    public function getAllPeminjaman(){
        $peminjaman = PinjamRuang::orderBy('tgl_pinjam', 'asc')->get()->map(function($peminjaman){
            return [
                'id' => $peminjaman->id_pinjam,
                'nim' => $peminjaman->user->id_user,
                'nama_peminjam' => $peminjaman->user->nama,
                'jam_mulai' => date('H:i', strtotime($peminjaman->jam_mulai)),
                'jam_selesai' => date('H:i', strtotime($peminjaman->jam_selesai)),
                'tanggal' => date('d/m/Y', strtotime($peminjaman->tgl_pinjam)),
                'ruangan' => $peminjaman->ruangan->nama_ruang,
                'keterangan' => $peminjaman->keterangan,
                'status' => $peminjaman->status,
                'jumlah_orang' => $peminjaman->jumlah_orang,
            ];
        });
        return response()->json($peminjaman, 200);
    }

    public function getAllKendala(){
        $kendala = LaporKendala::orderBy('tgl_lapor', 'asc')->get()->map(function($kendala){
            return [
                'nama_pelapor' =>$kendala->user->nama,
                'nim_nrp' => $kendala->user->id_user,
                'tanggal' => date('d/m/Y', strtotime($kendala->tgl_lapor)),
                'nama_ruangan' => $kendala->ruangan->nama_ruang,
                'jenis_kendala' => $kendala->jenis_kendala->nama_jenis_kendala,
                'bentuk_kendala' => $kendala->bentuk_kendala->nama_bentuk_kendala,
                'deskripsi_kendala' => $kendala->deskripsi_kendala,
                'status' => $kendala->status,
                'tanggal_penyelesaian' => $kendala->tgl_penyelesaian,
                'keterangan_penyelesaian' => $kendala->keterangan_penyelesaian,
            ];
        });
        return response()->json($kendala, 200);
    }

    public function getPeminjamanById(Request $request){
        $id = $request->id;
        $peminjaman = PinjamRuang::where('id_pinjam', $id)->first();

        if ($peminjaman) {
            return response()->json($peminjaman, 200);
        }
    
        return response()->json(['message' => 'Peminjaman not found'], 404);
    }

    public function getKendalaById(Request $request){
        $id = $request->id;
        $kendala = LaporKendala::where('id_lapor', $id)->first();

        if ($kendala) {
            return response()->json($kendala, 200);
        }
    
        return response()->json(['message' => 'Kendala not found'], 404);
    }

    public function verifikasiPeminjaman(Request $request){
        $id = $request->id;
        $peminjaman = PinjamRuang::where('id_pinjam', $id)->first();
        $peminjaman->status = $request->status;
        $peminjaman->save();

        return response()->json(['message' => 'Peminjaman updated'], 200);
    }

    public function verifikasiKendala(Request $request){
        $id = $request->id;
        $kendala = LaporKendala::where('id_lapor', $id)->first();
        $kendala->status = $request->status;
        $kendala->save();

        return response()->json(['message' => 'Kendala updated'], 200);
    }

    public function cekKetersediaanRuangan(Request $request)
    {
        $id_ruang = $request->id_ruang;
        $start_time = $request->jam_mulai;
        $end_time = $request->jam_selesai;
        $date = $request->tgl_pinjam;
    
        $overlappingReservations = PinjamRuang::where('id_ruang', $id_ruang)
            ->whereDate('tgl_pinjam', $date)
            ->where(function ($query) use ($start_time, $end_time) {
                $query->whereBetween('jam_mulai', [$start_time, $end_time])
                    ->orWhereBetween('jam_selesai', [$start_time, $end_time])
                    ->orWhere(function ($query) use ($start_time, $end_time) {
                        $query->where('jam_mulai', '<=', $start_time)
                              ->where('jam_selesai', '>=', $end_time);
                    });
            })
            ->exists();
    
        $overlappingSchedules = JadwalMK::where('id_ruang', $id_ruang)
            ->where('hari', date('l', strtotime($date))) 
            ->where(function ($query) use ($start_time, $end_time) {
                $query->whereBetween('jam_mulai', [$start_time, $end_time])
                    ->orWhereBetween('jam_selesai', [$start_time, $end_time])
                    ->orWhere(function ($query) use ($start_time, $end_time) {
                        $query->where('jam_mulai', '<=', $start_time)
                              ->where('jam_selesai', '>=', $end_time);
                    });
            })
            ->exists();
    
        if ($overlappingReservations || $overlappingSchedules) {
            return response()->json(['available' => false, 'message' => 'Ruangan tidak tersedia']);
        } else {
            return response()->json(['available' => true, 'message' => 'Ruangan tersedia']);
        }
    }

    public function getJadwal(Request $request)
    {
        $jadwal = JadwalMK::with(['mataKuliah', 'ruangan', 'user'])->get()->map(function($jadwal) {
            return [
                'ruangan' => $jadwal->ruangan->nama_ruang,
                'hari' => $jadwal->hari,
                'jamMulai' => $jadwal->jam_mulai,
                'jamSelesai' => $jadwal->jam_selesai,
                'namaMatkul' => $jadwal->mataKuliah->nama_mk,
                'kodeMatkul' => $jadwal->mataKuliah->id_mk,
                'namaDosen' => $jadwal->user->nama,
                'kodeDosen' => $jadwal->user->id_user,
            ];
        });
        return response()->json($jadwal, 200);
    }
}

