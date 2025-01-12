<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Llistat superherois</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @include('navbar')Z

    <div class="container mt-5">
        <div class="card shadow-lg p-4">
            <h2 class="mb-4">Categoria: <span class="text-primary">{{ $category->name }}</span></h2>

            <h3 class="mb-3">Idiomes disponibles:</h3>
            <ul class="list-group">
                @foreach ($languages as $language)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span><strong>Idioma:</strong> {{ $language->lang_code }} - <strong>Nom:</strong> {{ $language->name }}</span>
                    </li>
                @endforeach
            </ul>

            <a href="{{ route('category.index') }}" class="btn btn-secondary mt-4">Tornar</a>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
