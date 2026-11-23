@extends('layouts.app')

@section('title', 'Latest Articles | Star News')

@section('content')
<div class="row align-items-end mb-4 g-3">
    <div class="col-lg-7">
        <p class="text-primary text-uppercase fw-semibold small mb-2">The latest stories</p>
        <h1 class="display-5 fw-bold mb-1">Latest Articles</h1>
        <p class="text-secondary mb-0">Explore the latest updates across the topics that matter.</p>
    </div>
    <div class="col-lg-5">
        <label for="articleSearch" class="form-label fw-semibold">Search by article title</label>
        <input id="articleSearch" type="search" class="form-control form-control-lg" placeholder="e.g. technology, business..." autocomplete="off">
    </div>
</div>

<div class="d-flex justify-content-between align-items-center mb-3">
    <span class="text-secondary small">{{ $articles->count() }} articles</span>
    <span class="text-secondary small">Newest first</span>
</div>

<div id="articleGrid" class="row g-4">
    @forelse ($articles as $article)
        <div class="col-md-6 col-xl-4 article-card" data-title="{{ strtolower($article->title) }}">
            <article class="card h-100 border-0 shadow-sm article-tile">
                <div class="card-body p-4 d-flex flex-column">
                    <div class="mb-3"><span class="badge text-bg-primary-subtle text-primary">{{ $article->category->name }}</span></div>
                    <h2 class="h4 fw-bold"><a class="article-link text-decoration-none" href="{{ route('articles.show', $article->permalink) }}">{{ $article->title }}</a></h2>
                    <p class="text-secondary flex-grow-1">{{ $article->summary }}</p>
                    <div class="d-flex justify-content-between align-items-center pt-3 border-top small text-secondary">
                        <span>{{ $article->author ?? 'Star News Desk' }}</span>
                        <time datetime="{{ $article->published_at->toIso8601String() }}">{{ $article->published_at->format('d M Y') }}</time>
                    </div>
                    <a href="{{ route('articles.show', $article->permalink) }}" class="btn btn-outline-primary mt-3">Read article</a>
                </div>
            </article>
        </div>
    @empty
        <div class="col-12"><div class="alert alert-info">No published articles are available yet.</div></div>
    @endforelse
</div>
<p id="noResults" class="alert alert-warning mt-4 d-none">No articles match your search. Try another title.</p>
@endsection

@push('scripts')
<script src="{{ asset('js/article-search.js') }}" defer></script>
@endpush
