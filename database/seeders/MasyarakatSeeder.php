<?php

namespace Database\Seeders;

use App\Models\Masyarakat;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class MasyarakatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Masyarakat::create([
            'nik' => '201223',
            'nama' => 'Masyarakat1',
            'username' => 'user',
            'password' => hash::make('user123'),
            'telp' => '08211673256',
            'gender' => 'perempuan',
            'tgl_lahir' => Carbon::parse('2000-12-4'),
            'alamat' => 'Jl Tanjungsari'
        ]);
    }
}
