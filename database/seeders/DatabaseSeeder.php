<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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

        $user = \App\Models\User::create([
            'name' => 'Ali',
            'email' => 'aliimronali759@gmail.com',
            'jenis_kelamin' => 'Laki-laki',
            'tanggal_lahir' => '2004-08-12',
            'aktivitas' => '1.2',
            'email_verified_at' => now(),
            'role' => true,
            'password' => '12341234',
        ]);


        $bmi = \App\Models\Bmi::create([
            'user_id' => $user->id,
            'tinggi_badan' => 160,
            'berat_badan' => 67,
        ]);
    }
}
