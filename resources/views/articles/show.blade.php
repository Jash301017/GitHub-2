@extends('layouts.app')

@section('title', $article->title.' | Star News')

@section('content')
<a href="{{ route('articles.index') }}" class="text-decoration-none">&larr; Back to all articles</a>
<article class="mx-auto bg-white rounded-4 shadow-sm p-4 p-lg-5 mt-4 article-detail">
    <span class="badge text-bg-primary-subtle text-primary mb-3">{{ $article->category->name }}</span>
    <h1 class="display-5 fw-bold mb-3">{{ $article->title }}</h1>
    <p class="lead text-secondary">{{ $article->summary }}</p>
    <div class="border-top border-bottom py-3 my-4 d-flex flex-wrap gap-3 small text-secondary">
        <span>By {{ $article->author ?? 'Star News Desk' }}</span>
        <time datetime="{{ $article->published_at->toIso8601String() }}">Published {{ $article->published_at->format('d F Y, h:i A') }}</time>
    </div>
    <div class="article-body">{!! nl2br(e($article->body)) !!}</div>
</article>
@endsection
