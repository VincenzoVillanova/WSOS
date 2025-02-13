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
        <center>edit</center>
    </h1>

    <form action="/experience/{{ $experience->id }}" method="post">
        @csrf
        @method('PATCH')
        <span><b>Inserisci title</b></span><input type="text" name="title" value="{{ $experience->title }}"> <br>
        <span><b>Inserisci description</b></span><input type="text" name="description"
            value="{{ $experience->description }}">
        <br>
        <span><b>Inserisci category</b></span><input type="text" name="category" value="{{ $experience->category }}">
        <br>
        <span><b>Inserisci price</b></span><input type="number" name="price" min="1"
            value="{{ $experience->price }}">
        <br>
        <button>salva</button>
    </form>

    <br>
    <ul>
        <li> <a href="/">Torna alla home</a></li>
        <li> <a href="/experience">Torna alle experience</a></li>
    </ul>


</body>

</html>
