<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\PeranUser;
use App\Models\PinjamRuang;
use App\Models\LaporKendala;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'user';
    public $timestamps = false;
    protected $primaryKey = 'id_user';
    public $incrementing = false;
    protected $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_user',
        'nama',
        'no_tlp',
        'email',
        'password',
        'id_peran',
        'prodi',
        'dibuat_pada',
        'dimodif_pada',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    public function user(){
        return $this->belongsTo(PeranUser::class, 'id_peran', 'id_peran');
    }

    public function peminjaman(){
        return $this->hasMany(PinjamRuang::class, 'id_user', 'id_user');
    }

    public function kendala(){
        return $this->hasMany(LaporKendala::class, 'id_user', 'id_user');
    }
}
