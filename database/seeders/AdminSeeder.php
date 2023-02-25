<?php

namespace Database\Seeders;

use App\Models\Petugas;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Petugas::create([
            'nama_petugas' => 'Administrator',
            'username' => 'admin',
            'password' => Hash::make('admin123'),
            'telp' => '0821165789',
            'level' => 'admin',
            'gender' => 'laki-laki',
            'tgl_lahir' => Carbon::parse('2000-12-12'),

        ]);
        Petugas::create([
            'nama_petugas' => 'Petugas',
            'username' => 'petugas',
            'password' => Hash::make('petugas123'),
            'telp' => '0821184274',
            'level' => 'petugas',
            'gender' => 'laki-laki',
            'tgl_lahir' => Carbon::parse('2000-12-28'),
        ]);
    }
}
