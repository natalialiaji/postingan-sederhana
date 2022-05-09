<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(mt_rand(3,10)),
            'category_id' => mt_rand(1,4),
            'slug' => $this->faker->slug(),
            'excerpt' => $this->faker->paragraph(),
            // 'body' => $this->faker->paragraph(mt_rand(5,10)),
            'body' => collect($this->faker->paragraphs(mt_rand(5,10)))
                ->map(fn($paragraph) => "<p>$paragraph</p>")
                ->implode(''),
            'user_id' => \mt_rand(1,4),
        ];
    }
}
