<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Course;
use App\Models\Group;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
{
    // Crear grupos si no existen
    $groups = ['beginner', 'intermediate', 'advanced'];
    foreach ($groups as $name) {
        \App\Models\Group::firstOrCreate(['name' => $name]);
    }

    $this->call([
        RoboticsKitSeeder::class,
        UserSeeder::class,
    ]);

    \App\Models\Course::factory(10)->create();
}
}