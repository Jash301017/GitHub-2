<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $categoryNames = ['Business', 'Technology', 'Lifestyle', 'Sports', 'World News'];

        foreach ($categoryNames as $name) {
            Category::firstOrCreate(['name' => $name]);
        }

        $categories = Category::all();

        Article::factory()
            ->count(25)
            ->sequence(fn ($sequence) => [
                'category_id' => $categories[$sequence->index % $categories->count()]->id,
            ])
            ->create();
    }
}
