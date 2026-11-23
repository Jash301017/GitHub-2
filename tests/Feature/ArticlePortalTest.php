<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ArticlePortalTest extends TestCase
{
    use RefreshDatabase;

    public function test_homepage_displays_published_articles(): void
    {
        $category = Category::factory()->create(['name' => 'Technology']);
        Article::factory()->create([
            'title' => 'A Test Article',
            'category_id' => $category->id,
            'status' => 'published',
            'published_at' => now(),
        ]);

        $this->get('/')
            ->assertOk()
            ->assertSee('A Test Article')
            ->assertSee('Technology');
    }

    public function test_article_detail_displays_article_content_and_category(): void
    {
        $category = Category::factory()->create(['name' => 'Business']);
        $article = Article::factory()->create([
            'title' => 'Business Update',
            'permalink' => 'business-update-test',
            'body' => 'Full article content for testing.',
            'category_id' => $category->id,
            'status' => 'published',
            'published_at' => now(),
        ]);

        $this->get('/articles/'.$article->permalink)
            ->assertOk()
            ->assertSee('Business Update')
            ->assertSee('Full article content for testing.')
            ->assertSee('Business');
    }

    public function test_api_returns_articles_with_category_relationship(): void
    {
        $category = Category::factory()->create(['name' => 'World News']);
        Article::factory()->create([
            'title' => 'API Article',
            'category_id' => $category->id,
            'status' => 'published',
            'published_at' => now(),
        ]);

        $this->getJson('/api/articles')
            ->assertOk()
            ->assertJsonPath('data.0.title', 'API Article')
            ->assertJsonPath('data.0.category.name', 'World News');
    }

    public function test_unpublished_article_is_not_accessible(): void
    {
        $article = Article::factory()->create([
            'status' => 'draft',
            'published_at' => null,
        ]);

        $this->get('/articles/'.$article->permalink)->assertNotFound();
    }
}
