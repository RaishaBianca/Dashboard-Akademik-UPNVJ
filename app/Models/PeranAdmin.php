<?php

namespace App\Models;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PeranAdmin extends Model
{
    use HasFactory;
    protected $table = 'peran_admin';
    protected $primaryKey = 'id_peran';
    public $incrementing = false;
    protected $keyType = 'integer';
    public $timestamps = false;
    protected $fillable = [
        'id_peran',
        'nama_peran',
        'deskripsi_peran'
    ];
    public function admin()
    {
        return $this->hasMany(Admin::class, 'id_peran');
    }

}
