<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit gift</title>
</head>

<body>
    <h1>
        <center>Edit gift</center>
    </h1>
    <form action="/gift/{{ $gift->id }}" method="post">
        @csrf
        @method('PATCH')
        <span><b>nome regalo: </b></span><input type="text" name="name" value="{{ $gift->name }}"> <br>
        <span><b>a chi appartiene questo regalo? </b></span>
        <select name="kid_id">
            @foreach ($kid as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
        <br>
        <span><b>stato regalo? </b></span>
        <select name="status">
            <option value="0">Annullato</option>
            <option value="1">Confermato</option>
        </select>
        <button>Invia</button>
    </form>
    <a href="/gift">Torna ai bambini</a>
</body>

</html>
