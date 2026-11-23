<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<\App\Models\Article> */
class ArticleFactory extends Factory
{
    public function definition(): array
    {
        $title = fake()->sentence(6);

        return [
            'title' => rtrim($title, '.'),
            'summary' => fake()->paragraph(),
            'body' => fake()->paragraphs(5, true),
            'published_at' => fake()->dateTimeBetween('-1 year', 'now'),
            'permalink' => Str::slug($title).'-'.fake()->unique()->numberBetween(1000, 999999),
            'category_id' => Category::factory(),
            'status' => 'published',
            'author' => fake()->name(),
        ];
    }
}
