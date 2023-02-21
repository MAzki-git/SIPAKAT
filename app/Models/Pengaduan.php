<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;
    protected $table = 'pengaduans';
    protected $primaryKey = 'id_pengaduan';
    protected $guarded = ['id_pengaduan'];
    //     'judul_laporan',
    //     'tgl_pengaduan',
    //     'isi_laporan',
    //     'foto',
    //     'status',
    // ];

    protected $dates = ['tgl_pengaduan', 'deleted_at'];
    public function user()
    {
        return $this->hasOne(Masyarakat::class, 'nik', 'nik');
    }

    public function tanggapan()
    {
        return $this->belongsTo(Tanggapan::class, 'id_pengaduan', 'id_pengaduan');
    }
}
