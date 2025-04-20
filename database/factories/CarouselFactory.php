<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Carousel>
 */
class CarouselFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'content' => $this->faker->paragraph(),
            'image_path' => $this->faker->imageUrl(),
            'url' => $this->faker->url(),
            'order' => $this->faker->randomDigit(),
            'is_active' => $this->faker->numberBetween(0,1),
        ];
    }
}
