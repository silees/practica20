<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Usuario requerido por el laboratorio
        User::create([
            'name'     => 'Omar QM',
            'email'    => 'omarqm@example.com',
            'password' => Hash::make('Omar411*'),
            'role'     => 'admin',
        ]);

        // 4 usuarios adicionales
        User::create([
            'name'     => 'Maria Lopez',
            'email'    => 'maria@example.com',
            'password' => Hash::make('password123'),
            'role'     => 'usuario',
        ]);
        User::create([
            'name'     => 'Carlos Rios',
            'email'    => 'carlos@example.com',
            'password' => Hash::make('password123'),
            'role'     => 'usuario',
        ]);
        User::create([
            'name'     => 'Ana Torres',
            'email'    => 'ana@example.com',
            'password' => Hash::make('password123'),
            'role'     => 'usuario',
        ]);
        User::create([
            'name'     => 'Luis Mamani',
            'email'    => 'luis@example.com',
            'password' => Hash::make('password123'),
            'role'     => 'admin',
        ]);
    }
}