<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>
        <center>Edit genere</center>
    </h1>

    <form action="/genere/{{ $genere->id }}" method="post">
        @csrf
        @method('PATCH')
        <span>Inserisci nome genere: </span> <input type="text" name="name" value="{{ $genere->name }}">
        <button>Invia</button>
    </form>
    <br>
    <a href="/genere">Torna ai genere</a>
</body>

</html>
