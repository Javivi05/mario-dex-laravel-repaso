<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar personaje</title>
</head>
<body>
    <h1>Registrar personaje</h1>
     @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif
    <form action="{{ route('personajes.store') }}" method="post">
        @csrf
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="{{ old('nombre') }}"><br>
        <label for="tipo">Tipo:</label>
        <input type="text" name="tipo" value="{{ old('tipo') }}"><br>
        <label for="poder">Poder:</label>
        <input type="number" name="poder" min="1" value="{{ old('poder') }}"><br>
        <label for="mundo">Mundo:</label>
        <input type="text" name="mundo" value="{{ old('mundo') }}"><br>
        <button type="submit">Guardar</button>
    </form>
</body>
</html>