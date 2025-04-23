<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Activity>
 */
class ActivityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'instructor_id' => $this->faker->numberBetween(1, 3),
            'image_path' => $this->faker->imageUrl(),
            'name' => $this->faker->sentence(),
            'excerpt' => $this->faker->sentence(),
            'description' => $this->faker->paragraphs(5, true),
            'start_time' => $this->faker->dateTimeBetween('-1 month', '+2 months'),
            'end_time' => $this->faker->dateTimeBetween('+2 months', '+4 months'),
            'duration' => $this->faker->numberBetween(1, 20),
            'location' => $this->faker->city(),
            'address' => $this->faker->address(),
            'meeting_link' => $this->faker->url(),
            'materials' => $this->faker->text(),
            'prerequisites' => $this->faker->text(),
            'target_audience' => $this->faker->word(),
            'language' => $this->faker->languageCode(),
            'syllabus_url' => $this->faker->url(),
            'contact_email' => $this->faker->safeEmail(),
            'contact_phone' => $this->faker->phoneNumber(),
            'qr_code_link' => $this->faker->url(),
            'capacity' => $this->faker->numberBetween(10, 100),
            'price' => $this->faker->randomFloat(2, 10, 500),
            'type' => $this->faker->randomElement(['taller', 'curso', 'curso-taller', 'diplomado']),
            'syllabus' => $this->faker->paragraphs(3, true),
            'modules' => $this->faker->numberBetween(1, 10),
            'credits' => $this->faker->numberBetween(1, 5),
            'frequency' => $this->faker->randomElement(['unico', 'semanal', 'mensual', 'otro', null]),
            'methodology' => $this->faker->paragraph(),
            'status' => $this->faker->randomElement(['borrador', 'publicado', 'completado', 'cancelado', 'archivado']),
            'is_active' => $this->faker->boolean(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
