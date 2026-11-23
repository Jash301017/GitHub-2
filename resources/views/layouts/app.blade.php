<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Latest stories and updates from Star Media Group.">
    <title>@yield('title', 'Star Article Portal')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('articles.index') }}">STAR <span class="fw-normal">NEWS</span></a>
        <span class="navbar-text text-white-50 small">Stories that matter</span>
    </div>
</nav>
<main class="container py-5">
    @yield('content')
</main>
<footer class="border-top bg-white py-4 mt-5">
    <div class="container text-muted small">Star Article Portal · Laravel & SQLite</div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>
