<?php

namespace Database\Seeders;

use App\Models\Gender;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([MasyarakatSeeder::class]);
        $this->call([AdminSeeder::class]);
        $this->call([kategoriSeeder::class]);

        // \App\Models\User::factory(10)->create();
    }
}
