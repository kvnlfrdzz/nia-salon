<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed akun admin pertama untuk aplikasi Nia Salon.
     *
     * Cara menjalankan:
     *   php artisan db:seed
     *
     * Atau bisa juga lewat Tinker:
     *   php artisan tinker
     *   >>> \App\Models\User::create([
     *   ...     'name'      => 'Admin Nia',
     *   ...     'email'     => 'admin@niasalon.com',
     *   ...     'password'  => bcrypt('passwordRahasia123!'),
     *   ...     'usertype'  => 'admin',
     *   ... ]);
     */
    public function run(): void
    {
        // Buat akun admin — GANTI email & password sebelum deploy!
        User::firstOrCreate(
            ['email' => 'niasalon@gmail.com'],
            [
                'name'      => 'Nia',
                'password'  => bcrypt('niasalon123'),
                'usertype'  => 'admin',
            ]
        );
    }
}