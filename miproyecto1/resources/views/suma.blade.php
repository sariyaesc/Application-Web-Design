<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suma Simple</title>
</head>
<body>
    <h1>Suma de dos números</h1>
    <form method="POST" action="{{ route('sumar') }}">
        @csrf
        <label for="num1">Número 1:</label>
        <input type="number" name="num1" id="num1" required>
        <br>
        <label for="num2">Número 2:</label>
        <input type="number" name="num2" id="num2" required>
        <br>
        <button type="submit">Sumar</button>
    </form>

    @if(isset($resultado))
        <h2>Resultado: {{ $resultado }}</h2>
    @endif
</body>
</html>