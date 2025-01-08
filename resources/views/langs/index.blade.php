<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Llistat d'idiomes</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    @include('navbar')
    
    <div class="container mt-5">
        <h1 class="mb-4">Llistat d'idiomes</h1>
        <a href="{{ route('langs.create') }}" class="btn btn-primary mb-3">Afegir idioma</a>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Nom</th>
                    <th>Codi</th>
                    <th>Accions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($langs as $lang)
                    <tr>
                        <td>{{ $lang->name }}</td>
                        <td>{{ $lang->code }}</td>
                        <td>
                            <a href="{{ route('langs.show', $lang) }}" class="btn btn-info btn-sm">Mostrar</a>
                            <a href="{{ route('langs.edit', $lang) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('langs.destroy', $lang) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
