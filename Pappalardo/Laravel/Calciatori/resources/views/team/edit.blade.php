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
        <center>modifica team</center>
    </h1>

    <form action="/team/{{ $team->id }}" method="post">
        @csrf
        @method('PATCH')
        <span>nome team:</span><input type="text" value="{{ $team->name }}" name="name">
        <span>anno fondazione:</span><input type="number" value="{{ $team->date }}" name="date">
        <button>invia</button>
    </form>
</body>

</html>
