<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Divisi;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Divisi::create([
            'division' => 'programmer'
        ]);
        Divisi::create([
            'division' => 'Web staff'
        ]);
        Divisi::create([
            'division' => 'editorial'
        ]);

        User::create([
            'no_mbkm' => '0000000',
            'name' => 'Admin Seameo Recfon',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'),
            'role' => 'admin',
        ]);
        User::create([
            'no_mbkm' => '11111111',
            'name' => 'contoh user',
            'email' => 'user@gmail.com',
            'password' => bcrypt('user123'),
            'role' => 'students',
            'divisi_id' => '1'
        ]);


    }
}
