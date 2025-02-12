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
        <center>Home order</center>
    </h1>
    <table border="1">
        <tr>
            <th>id</th>
            <th>numbero ordine</th>
            <th>cliente</th>
            <th colspan="2">azioni</th>
        </tr>
        @foreach ($order as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->number }}</td>
                <td>{{ $item->client->name }}</td>
                <td>
                    <form action="/order/{{ $item->id }}/edit" method="get">
                        <button>modifica</button>
                    </form>
                </td>
                <td>
                    <form action="/order/{{ $item->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button>elimina</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <br>
    <h3>Inserisci un nuovo order</h3>
    <form action="/order" method="post">
        @csrf
        <span>inserisci numbero ordine:</span><input type="number" name="number"> <br>
        <span>inserisci cliente:</span>
        <select name="client_id">
            @foreach ($client as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
        <button>Invia</button>
    </form>
    <br>
    <h3>Ricerca per cliente:</h3>
    <form action="/order/api/serchByOrder" method="post">
        @csrf
        <select name="id">
            @foreach ($client as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
        <button>Ricerca</button>
    </form>
</body>

</html>
