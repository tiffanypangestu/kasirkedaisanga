<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->text(),
            'price' => $this->faker->numberBetween(1000, 100000),
            'category_id' => $this->faker->numberBetween(1, 2),
            'img' => fake()->randomElement([
                'https://plus.unsplash.com/premium_photo-1668146927669-f2edf6e86f6f',
                'https://images.unsplash.com/photo-1611518040286-9af8ba97ab46?q',
                'https://images.unsplash.com/photo-1614563637806-1d0e645e0940?q',
                'https://images.unsplash.com/photo-1569050467447-ce54b3bbc37d?q',
                'https://plus.unsplash.com/premium_photo-1694547924505-caf71944b4df?q',
            ]),
            'is_active' => $this->faker->boolean(),
        ];
    }
}
