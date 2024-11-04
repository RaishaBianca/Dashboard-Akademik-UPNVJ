<?php

namespace App\Models;

use App\Models\JadwalMK;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MataKuliah extends Model
{
    use HasFactory;
    protected $table = 'mata_kuliah';
    public $timestamps = false;
    protected $primaryKey = 'id_mk';
    public $incrementing = false;
    protected $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'id_mk',
        'nama_mk',
        'sks',
    ];

    public function jadwalMk()
    {
        return $this->hasMany(JadwalMK::class, 'id_mk');
    }
}
