<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PeranUser extends Model
{
    use HasFactory;

    protected $table = 'peran_user';

    public $timestamps = false;

    protected $primaryKey = 'id_peran'; 

    public $incrementing = false; 

    protected $keyType = 'int';

    protected $fillable = [
        'id_peran',
        'nama_peran',
        'deskripsi_peran',
    ];

    public function user()
    {
        return $this->hasMany(User::class, 'id_peran', 'id_peran');
    }
}