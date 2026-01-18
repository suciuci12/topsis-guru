<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
  use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{


public function run()
{
    // ADMIN
    User::create([
        'name' => 'Admin',
        'email' => 'admin@gmail.com',
        'password' => Hash::make('admin123'),
        'role' => 'admin'
    ]);

    // KEPSEK
    User::create([
        'name' => 'Kepala Sekolah',
        'email' => 'kepsek@gmail.com',
        'password' => Hash::make('kepsek123'),
        'role' => 'kepsek'
    ]);
}

}
