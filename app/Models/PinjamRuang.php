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
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $fillable = [
        'id_pinjam',
        'id_user',
        'id_ruangan',
        'tgl_pinjam',
        'jam_mulai',
        'jam_selesai',
        'keterangan',
        'status',
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
