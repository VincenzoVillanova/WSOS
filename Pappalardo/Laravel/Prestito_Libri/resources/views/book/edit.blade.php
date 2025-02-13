<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>
</head>

<body>
    <h1>
        <center>Edit</center>
    </h1>
    <form action="/book/{{ $book->id }}" method="post">
        @csrf
        @method('PATCH')
        <span><b>inserisci title:</b></span> <input type="text" name="title" value="{{ $book->title }}"> <br>
        <span><b>inserisci author:</b></span> <input type="text" name="author" value="{{ $book->author }}"> <br>
        <span><b>inserisci genre:</b></span> <input type="text" name="genre" value="{{ $book->genre }}"> <br>
        <span><b>inserisci available_copies:</b></span> <input type="number" name="available_copies"
            value="{{ $book->available_copies }}"> <br>
        <button>salva</button>
    </form>
    <ul>
        <li><a href="/book">Torna ai book!</a></li>
        <li><a href="/">Torna alla home!</a></li>
    </ul>
</body>

</html>
