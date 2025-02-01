<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit team</title>
</head>

<body>
    <h1>
        <center>Edit team</center>
    </h1>
    <form action="/team/{{ $team->id }}" method="post">
        @csrf
        @method('PATCH')
        <span>nome squadra: </span> <input type="text" name="name" value="{{ $team->name }}">
        <span> punti squadra: </span> <input type="text" name="point" value="{{ $team->point }}">
        <button>invia</button>
    </form>
</body>

</html>
