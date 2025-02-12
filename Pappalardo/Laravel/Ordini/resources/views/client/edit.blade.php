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
        <center>Edit client</center>
    </h1>
    <form action="/client/{{ $client->id }}" method="post">
        @csrf
        @method('PATCH')
        <span>inserisci nominativo:</span><input type="text" name="name" value="{{ $client->name }}"> <br>
        <span>inserisci città:</span><input type="text" name="city" value="{{ $client->city }}">
        <button>Invia</button>
    </form>
</body>

</html>
