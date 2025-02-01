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
        <center>Inserimento player</center>
    </h1>

    <form action="/player" method="post">
        @csrf
        <span>nome player:</span><input type="text" name="name">
        <span>numero maglia:</span><input type="number" name="number">
        <span>squadra :</span>
        <select name="team_id">
            @foreach ($teams as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
        <button>invia</button>
    </form>
</body>

</html>
