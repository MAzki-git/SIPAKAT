<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Masyarakat extends Authenticatable
{
    use HasFactory, SoftDeletes;

    protected $guard = 'masyarakat';
    protected $table = 'masyarakats';
    protected $primaryKey = 'nik';
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'nik',
        'nama',
        'username',
        'password',
        'password',
        'telp',
        'tgl_lahir',
        'foto',
        'gender',
        'alamat'
    ];
}
