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
    }
}
