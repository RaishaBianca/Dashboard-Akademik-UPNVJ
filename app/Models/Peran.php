<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peran extends Model
{
    protected $table = 'peran';

    public $timestamps = false;

    protected $primaryKey = 'id_peran'; 

    public $incrementing = false; 

    protected $keyType = 'int';

    protected $fillable = [
        'id_peran',
        'role',
        'nama_peran',
        'deskripsi_peran',
    ];

    public function user()
    {
        return $this->hasMany(User::class, 'id_peran', 'id_peran');
    }
}
