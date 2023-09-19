<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MotorcycleFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement(['Yamaha', 'Honda', 'Kawasaki', 'Suzuki']),
            'model' => fake()->randomElement(['R1', 'CBR', 'Ninja', 'GSX']),
            'category' => fake()->randomElement(['Sport', 'Naked', 'Touring', 'Cruiser']),
            'image' => fake()->randomElement(['yamaha-r1.jpg', 'honda-cbr.jpg', 'kawasaki-ninja.jpg', 'suzuki-gsx.jpg']),
            'description' => fake()->randomElement(['The Yamaha YZF-R1',
                'The Honda CBR',
                'The Kawasaki',
                'The Suzuki']),
            'price' => fake()->randomFloat(2, 10000, 20000),
            'stock' => fake()->numberBetween(0, 10),
            'state' => fake()->randomElement(['Antioquia', 'Cundinamarca']),
            'brand_id' => fake()->numberBetween(1, 4),
        ];
    }

    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
