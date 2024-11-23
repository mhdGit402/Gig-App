<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Gig>
 */
class GigFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'tags' => fake()->words(),
            'company' => fake()->company(),
            'location' => fake()->locale(),
            'email' => fake()->email(),
            'website' => fake()->domainName(),
            'description' => fake()->paragraph(5),
        ];
    }
}
