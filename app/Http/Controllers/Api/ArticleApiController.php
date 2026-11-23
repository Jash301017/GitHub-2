<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\JsonResponse;

class ArticleApiController extends Controller
{
    public function index(): JsonResponse
    {
        $articles = Article::query()
            ->with('category')
            ->where('status', 'published')
            ->whereNotNull('published_at')
            ->latest('published_at')
            ->paginate(15);

        return response()->json($articles);
    }

    public function show(Article $article): JsonResponse
    {
        abort_unless($article->status === 'published' && $article->published_at, 404);

        return response()->json($article->load('category'));
    }
}
