<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Miguel Ángel',
            'email' => 'ymp4k3ge9e7qr6wuk1xyxfdb8fzkhk@gmail.com',
            'password' => Hash::make('123456789')
        ]);
        $admin->assignRole('Super Admin');
    }
}
