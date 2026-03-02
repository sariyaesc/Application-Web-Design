<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\Group;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    // Crear un Admin
    User::create([
        'name' => 'Admon',
        'email' => 'admon@robotics.com',
        'password' => bcrypt('Adm@2022'),
        'role' => 'admin'
    ]);

    // Crear un Teacher
    User::create([
        'name' => 'Profesor Robot',
        'email' => 'teacher@robotics.com',
        'password' => bcrypt('Pass@2026'),
        'role' => 'teacher'
    ]);

    // Para el estudiante, necesitamos que exista un grupo primero
    $group = Group::first() ?? Group::create(['name' => 'beginner']);

    User::create([
        'name' => 'Estudiante Uno',
        'email' => 'student@robotics.com',
        'password' => bcrypt('Student@2026'),
        'role' => 'student',
        'group_id' => $group->id
    ]);
}
}
