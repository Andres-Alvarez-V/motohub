<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class BrandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement(['Yamaha', 'Honda', 'Kawasaki', 'Suzuki']),
            'country_origin' => fake()->randomElement(['Japan', 'Italy', 'Germany', 'USA']),
            'foundation_year' => fake()->date('Y'),
            'logo_image' => fake()->randomElement(['yamaha-logo.jpg', 'honda-logo.jpg', 'kawasaki-logo.jpg', 'suzuki-logo.jpg']),
            'description' => fake()->randomElement([
                'Yamaha Motor Company Limited',
                'Honda Motor Company, Ltd',
                'Kawasaki Heavy Industries Ltd',
                'Suzuki Motor Corporation',
            ]),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
