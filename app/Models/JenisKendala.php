<?php

namespace App\Models;

use App\Models\LaporKendala;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JenisKendala extends Model
{
    use HasFactory;
    protected $table = 'jenis_kendala';
    protected $primaryKey = 'id_jenis_kendala';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $fillable = [
        'id_jenis_kendala',
        'nama_jenis_kendala',
    ];

    public function jenis_kendala()
    {
        return $this->hasMany(LaporKendala::class, 'id_jenis_kendala');
    }
    
}
