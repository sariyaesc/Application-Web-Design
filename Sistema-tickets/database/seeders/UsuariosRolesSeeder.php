<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsuariosRolesSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name'     => 'Administrador',
            'email'    => 'admin@tickets.com',
            'password' => Hash::make('password'),
            'rol'      => 'admin',
        ]);

        User::create([
            'name'     => 'Gerente General',
            'email'    => 'gerente@tickets.com',
            'password' => Hash::make('password'),
            'rol'      => 'gerente',
        ]);

        User::create([
            'name'     => 'Juan Pérez',
            'email'    => 'usuario@tickets.com',
            'password' => Hash::make('password'),
            'rol'      => 'usuario',
        ]);
    }
}