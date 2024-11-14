<?php

namespace App\Models;

use App\Models\LaporKendala;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BentukKendala extends Model
{
    use HasFactory;
    protected $table = 'bentuk_kendala';   
    protected $primaryKey = 'id_bentuk_kendala';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $fillable = [
        'id_bentuk_kendala',
        'nama_bentuk_kendala',
    ];

    public function bentuk_kendala()
    {
        return $this->hasMany(LaporKendala::class, 'id_bentuk_kendala');
    }
}
