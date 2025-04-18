<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'path' => $this->faker->unique()->randomElement([
                'media/example1.jpeg',
                'media/example2.jpeg',
                'media/example3.jpeg',
                'media/example4.jpeg',
                'media/example5.jpeg',
                'media/example6.jpeg',
                'media/example7.jpeg',
                'media/example8.jpeg',
                'media/example9.jpeg',
                'media/example10.jpeg',
                'media/example11.jpeg',
                'media/example12.jpeg',
                'media/example13.jpeg',
                'media/example14.jpeg',
                'media/example15.jpeg'
            ]),
        ];
    }
}
