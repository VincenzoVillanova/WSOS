<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Progetti</title>
</head>

<body>
    <h1>
        <center>Progetti</center>
    </h1>
    <form action="/projects/{{ $project->id }}" method="post">
        @csrf
        @method('PATCH')
        Titolo: <input type="text" name="title" value="{{ $project->title }}"><br>
        Descrizione: <br>
        <textarea name="description" cols="30" rows="10">{{ $project->description }}</textarea>
        <br>
        <button>Invia</button>
    </form>
</body>

</html>
