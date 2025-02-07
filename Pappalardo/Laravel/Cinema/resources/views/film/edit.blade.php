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
        <center>Edit film</center>
    </h1>

    <form action="/film/{{ $film->id }}" method="post">
        @csrf
        @method('PATCH')
        <span>Inserisci nome film: </span> <input type="text" name="name" value="{{ $film->name }}">
        <span>Inserisci autore film: </span> <input type="text" name="author" value="{{ $film->author }}"> <br>
        <span>Inserisci anno film: </span> <input type="number" name="year" value="{{ $film->year }}"> <br>
        <span>Inserisci genere film: </span>
        <select name="genere_id">
            @foreach ($genere as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
        <button>Invia</button>
    </form>
    <br>
    <a href="/film">Torna ai film</a>
</body>

</html>
