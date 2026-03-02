<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\RoboticsKit;

class RoboticsKitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    $kits = ['StarterKit', 'Educational Robotics Kit', 'Kit5'];

    foreach ($kits as $kitName) {
        RoboticsKit::create([
            'name' => $kitName,
            'description' => 'Descripción básica para ' . $kitName
        ]);
    }
}
}
