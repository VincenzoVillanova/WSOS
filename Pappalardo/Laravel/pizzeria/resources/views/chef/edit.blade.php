<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modifica</title>
</head>

<body>
    <h1>
        <center>Edit Chef</center>
    </h1>
    <form action="/chefs/{{ $chef->id }}" method="post">
        @csrf
        @method('PATCH')
        <span>name:</span> <input type="text" name="name" value="{{ $chef->name }}"> <br>
        <span>age:</span><input type="number" name="age" value="{{ $chef->age }}"> <br>
        <span>level:</span><input type="number" name="level" value="{{ $chef->level }}"> <br>
        <button>Salva</button>
    </form>
    <br>
    <a href="/chefs">Vai a vedere gli chef</a>
    <br>
    <a href="/restaurants">Vai a vedere il ristorante</a>
</body>

</html>
