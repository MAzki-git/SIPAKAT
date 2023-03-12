<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use function PHPSTORM_META\map;

class Pengaduan extends Model
{
    use HasFactory, SoftDeletes;


    protected $table = 'pengaduans';
    protected $primaryKey = 'id_pengaduan';
    protected $fillable = [
        'nik',
        'judul_laporan',
        'tgl_pengaduan',
        'alamat',
        'isi_laporan',
        'foto',
        'id_kategori',
        'status',
    ];

    protected $dates = ['tgl_pengaduan', 'deleted_at'];
    public function user()
    {
        return $this->hasOne(Masyarakat::class, 'nik', 'nik');
    }

    public function tanggapan()
    {
        return $this->belongsTo(Tanggapan::class, 'id_pengaduan', 'id_pengaduan');
    }

    public function kategori()
    {
        return $this->belongsTo(kategori::class, 'id_kategori', 'id_kategori');
    }
}
