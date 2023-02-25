<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    use HasFactory;
    protected $table = 'kategoris';
    protected $primaryKey = 'id_kategori';
    protected $fillable = ['nama'];
    public function pengaduan()
    {
        return $this->hashOne(Pengaduan::class, 'id_pengaduan', 'id_pengaduan');
    }
}
