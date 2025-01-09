<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create translation</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    @include('navbar')

    <div class="container mt-5">
        <h1 class="mb-4">Crear traducció</h1>
        <form action="{{ route('translate.translate') }}" method="POST">
            @csrf
            <div class="form-group">    
                <label for="language_id">Escollir idioma:</label>
                <select name="language_id" class="form-control">
                    @foreach($languages as $language)
                        <option value="{{ $language->id }}">{{ $language->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="category_id">Escollir categoria:</label>
                <select name="category_id" class="form-control">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="name">Traducció:</label>
                <input type="text" name="name" class="form-control" value="">
            </div>

            <button type="submit" class="btn btn-primary">Traduïr</button>
        </form>

        <br>

        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Categoria</th>
                    <th>Idioma</th>
                    <th>Traducció</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pivots as $pivot)
                    <tr>
                        <td>{{ App\Models\Lang::find($pivot->lang_id)->name }}</td>
                        <td>{{ App\Models\Category::find($pivot->category_id)->name }}</td>
                        <td>{{ $pivot->name }}</td>
                        <td>
                            <form action="{{ route('translate.destroy', $pivot->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
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