<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalls de l'idioma</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @include('navbar')

    <div class="container mt-5">
        <div class="card shadow-lg p-4">
            <h2 class="mb-4">
                <strong>Idioma:</strong> <span class="text-primary">{{ $language->name }}</span>
            </h2>

            <h3 class="mb-3"><strong>Categories disponibles:</strong></h3>
            @if ($categories->isEmpty())
                <p class="text-muted">No hi ha categories disponibles per aquest idioma.</p>
            @else
                <ul class="list-group">
                    @foreach ($categories as $category)
                        <li class="list-group-item">
                            <a href="{{ route('category.show', $category->id) }}" class="text-decoration-none">
                                {{ $category->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            @endif

            <a href="{{ route('langs.index') }}" class="btn btn-secondary mt-4">Tornar</a>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>