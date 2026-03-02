<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\RoboticsKit;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
    return [
        'title' => fake()->sentence(3),
        'cover_image' => fake()->imageUrl(640, 480, 'robotics'),
        'content' => fake()->paragraph(),
        // Esto toma un ID al azar de los kits que ya existen
        'robotics_kit_id' => RoboticsKit::inRandomOrder()->first()->id ?? 1
    ];
}
}
