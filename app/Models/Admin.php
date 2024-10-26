<?php

namespace App\Models;

use App\Models\PeranAdmin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends Model
{
    use HasFactory;
    protected $table = 'admin';
    protected $primaryKey = 'id_admin';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $fillable = [
        'id_admin',
        'nama',
        'no_tlp',
        'email',
        'password',
        'id_peran',
        'remember_token',
        'dibuat_pada',
        'dimodif_pada'
    ];
    protected $hidden = [
        'password',
        'remember_token'
    ];
    public function peran()
    {
        return $this->hasMany(PeranAdmin::class, 'id_peran');
    }
    
}
