<?php

namespace App\Models;

use App\Models\Gedung;
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
        'jam_tersedia',
        'kapasitas',
    ];
    public function gedung()
    {
        return $this->belongsTo(Gedung::class, 'id_gedung');
    }
}
