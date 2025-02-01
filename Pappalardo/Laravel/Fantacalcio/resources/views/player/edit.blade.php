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
        <center>Modifica Calciatore</center>
    </h1>
    <form action="/player/{{ $player->id }}" method="post">
        @csrf
        @method('PATCH')
        <span>nome calciatore: </span><input type="text" name="name" value="{{ $player->name }}">
        <br>
        <span>età calciatore: </span><input type="number" name="age" value="{{ $player->age }}"> <br>
        <span>infortunato:</span>
        <select name="injured">
            <option value="0" @if (0 == $player->injured) selected @endif>no</option>
            <option value="1" @if (1 == $player->injured) selected @endif>si</option>
        </select>
        <br>
        <span>Seleziona Team: </span>
        <select name="team_id">
            @foreach ($teams as $item)
                <option value="{{ $item->id }}" @if ($item->id == $player->team_id) selected @endif>
                    {{ $item->name }}
                </option>
            @endforeach
        </select>
        <button>invia</button>
    </form>
</body>

</html>
