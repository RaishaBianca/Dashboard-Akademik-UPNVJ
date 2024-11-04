<?php

namespace App\Models;

use App\Models\User;
use App\Models\Ruangan;
use App\Models\JenisKendala;
use App\Models\BentukKendala;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LaporKendala extends Model
{
    use HasFactory;
    protected $table = 'lapor_kendala';
    protected $primaryKey = 'id_lapor';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;
    protected $fillable = [
        'tgl_lapor',
        'id_user',
        'id_ruang',
        'id_jenis_kendala',
        'id_bentuk_kendala',
        'deskripsi_kendala',
        'status',
        'tgl_penyelesaian',
        'keterangan_penyelesaian'
    ];

    public function kendala()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    public function bentuk_kendala()
    {
        return $this->belongsTo(BentukKendala::class, 'id_bentuk_kendala');
    }
    public function jenis_kendala()
    {
        return $this->belongsTo(JenisKendala::class, 'id_jenis_kendala');
    }
    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class, 'id_ruang');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
