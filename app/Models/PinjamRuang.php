<?php

namespace App\Models;

use App\Models\User;
use App\Models\Ruangan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PinjamRuang extends Model
{
    use HasFactory;
    protected $table = 'pinjam_ruang';
    protected $primaryKey = 'id_pinjam';
    public $incrementing = true; 
    protected $keyType = 'int'; 
    public $timestamps = false;
    protected $fillable = [
        'id_user',
        'id_ruang',
        'tgl_pinjam',
        'jam_mulai',
        'jam_selesai',
        'keterangan',
        'status',
        'jumlah_orang'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class, 'id_ruang');
    }
}
