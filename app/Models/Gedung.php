<?php

namespace App\Models;

use App\Models\Ruangan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gedung extends Model
{
    use HasFactory;
    protected $table = 'gedung';
    protected $primaryKey = 'id_gedung';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $fillable = [
        'id_gedung',
        'nama_gedung',
        'deskripsi'
    ];
    public function ruangan()
    {
        return $this->hasMany(Ruangan::class, 'id_gedung');
    }

}
