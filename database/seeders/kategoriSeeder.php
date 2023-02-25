<?php

namespace Database\Seeders;

use App\Models\kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class kategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        kategori::create([
            'nama' => 'kesehatan',
        ]);
        kategori::create([
            'nama' => 'sosial dan kesejahteraan',
        ]);
        kategori::create([
            'nama' => 'Ekonomi dan keuangan',
        ]);
        kategori::create([
            'nama' => 'Lingkungan hidup dan kehutanan',
        ]);
        kategori::create([
            'nama' => 'Pertanian dan peternakan',
        ]);
        kategori::create([
            'nama' => 'Teknologi informasi dan komunikasi',
        ]);
        kategori::create([
            'nama' => 'Kependudukan',
        ]);
        kategori::create([
            'nama' => 'Ketentraman, ketertiban umum dan perlingundan masyarakat',
        ]);
        kategori::create([
            'nama' => 'Pembangunan daerah tertinggal',
        ]);
        kategori::create([
            'nama' => 'Topik lainnya',
        ]);
    }
}
