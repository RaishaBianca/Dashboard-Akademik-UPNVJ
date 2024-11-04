<?php

namespace App\Models;

use App\Models\User;
use App\Models\Ruangan;
use App\Models\MataKuliah;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JadwalMK extends Model
{
    use HasFactory;
    protected $table = 'jadwal_mk';
    public $timestamps = false;
    protected $primaryKey = 'id_jadwal';
    public $incrementing = true;
    protected $keyType = 'int';
    protected $fillable = [
        'id_mk',
        'id_ruang',
        'id_dosen',
        'jam_mulai',
        'jam_selesai',
        'hari',
    ];

    public function mataKuliah()
    {
        return $this->belongsTo(MataKuliah::class, 'id_mk');
    }
    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class, 'id_ruang');
    }
    public function dosen()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
