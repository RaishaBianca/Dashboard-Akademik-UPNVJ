<?php

namespace App\Models;

use App\Models\Gedung;
use App\Models\JadwalMK;
use App\Models\PinjamRuang;
use App\Models\LaporKendala;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ruangan extends Model
{
    use HasFactory;
    protected $table = 'ruangan';
    protected $primaryKey = 'id_ruang';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $fillable = [
        'id_ruang',
        'id_gedung',
        'nama_ruang',
        'deskripsi',
        'jam_buka',
        'jam_tutup',
        'kapasitas',
    ];

    public function peminjaman()
    {
        return $this->hasMany(PinjamRuang::class, 'id_pinjam');
    }
    public function gedung()
    {
        return $this->belongsTo(Gedung::class, 'id_gedung');
    }
    public function kendala()
    {
        return $this->hasMany(LaporKendala::class, 'id_ruang');
    }
    public function jadwal(){
        return $this->hasMany(JadwalMK::class, 'id_ruang');
    }
}
