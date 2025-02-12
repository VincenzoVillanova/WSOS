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
        <center>Edit order</center>
    </h1>
    <form action="/order/{{ $order->id }}" method="post">
        @csrf
        @method('PATCH')
        <span>inserisci numbero ordine:</span><input type="number" name="number" value="{{ $order->number }}"> <br>
        <span>inserisci cliente:</span>
        <select name="client_id">
            @foreach ($client as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
        <button>Invia</button>
    </form>
</body>

</html>
