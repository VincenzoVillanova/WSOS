<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>edit</title>
</head>

<body>
    <h1>
        <center>edit genre</center>
    </h1>
    <form action="/books/{{ $book->id }}" method="post">
        @csrf
        @method('PATCH')
        <span>inserici nome</span> <input type="text" value="{{ $book->name }}" name="name">
        <br>
        <span>inserici autore</span> <input type="text" value="{{ $book->author }}" name="author">
        <br>
        <span>inserici anno</span> <input type="number" value="{{ $book->year }}" name="year">
        <br>
        <select name="genre_id">
            @foreach ($genre as $g)
                <option value="{{ $g->id }}">{{ $g->name }}</option>
            @endforeach
        </select>
        <button>invia</button>
    </form>
</body>

</html>
