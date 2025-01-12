<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Crear idioma</title>
</head>

<body>
    @include('navbar')

    <div class="container mt-5">
        <div class="card p-4 shadow-lg">
            <h1 class="mb-4 text-center">Crear nou idioma</h1>

            <form action="{{ route('langs.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Nom de l'idioma:</label>
                    <input type="text" id="name" name="name" class="form-control"
                        placeholder="Introdueix el nom de l'idioma" required>
                </div>
                <div class="form-group">
                    <label for="code">Codi de l'idioma:</label>
                    <input type="text" id="code" name="code" class="form-control"
                        placeholder="Introdueix el codi de l'idioma" required>
                </div>

                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-success">Crear idioma</button>
                    <a href="{{ route('langs.index') }}" class="btn btn-secondary">Cancel·lar</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
