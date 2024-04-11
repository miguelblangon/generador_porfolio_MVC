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
            'email' => 'miguelblangon@gmail.com',
            'password' => Hash::make('123456789')
        ]);
        $admin->assignRole('Super Admin');
        $user = User::create([
            'name' => 'usuario',
            'email' => 'usuario@usuario.com',
            'password' => Hash::make('123456789')
        ]);
        $user->assignRole('User');

    }
}
