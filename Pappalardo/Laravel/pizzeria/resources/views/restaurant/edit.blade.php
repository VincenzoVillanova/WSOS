<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modifica</title>
</head>

<body>
    <h1>
        <center>Edit ristorante</center>
    </h1>
    <form action="/restaurants/{{ $restaurant->id }}" method="post">
        @csrf
        @method('PATCH')
        <span>name:</span> <input type="text" name="name" value="{{ $restaurant->name }}"> <br>
        <span>foundation:</span><input type="number" name="foundation" value="{{ $restaurant->foundation }}"> <br>
        <span>star:</span><input type="number" name="star" value="{{ $restaurant->star }}"> <br>
        <span>Inserisci chef</span>
        <select name="chef_id">
            @foreach ($chefs as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
        <button>Salva</button>
    </form>
    <br>
    <a href="/chefs">Vai a vedere gli chef</a>
    <br>
    <a href="/restaurants">Vai a vedere il ristorante</a>
</body>

</html>
