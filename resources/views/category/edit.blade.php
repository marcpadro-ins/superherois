<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Editar categoria</title>
</head>
<body>
    @include('navbar')

    <div class="container mt-5">
        <h1 class="mb-4">Editar categoria</h1>
        <form action="{{ route('category.update', $category->id) }}" method="POST" class="card p-4 shadow">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nom de la categoria:</label>
                <input 
                    type="text" 
                    id="name" 
                    name="name" 
                    class="form-control" 
                    value="{{ old('name', $category->name) }}" 
                    required
                >
            </div>

            <button type="submit" class="btn btn-success">Actualizar Categoria</button>
            <a href="javascript:history.back()" class="btn btn-secondary">Cancel·lar</a>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
