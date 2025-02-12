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
        <center>Home gift</center>
    </h1>
    <table border="1" style="color: white; background-color:black">
        <tr>
            <th>id</th>
            <th>nome regalo</th>
            <th>nome bambino</th>
            <th>stato</th>
            <th colspan="2">azioni</th>
        </tr>
        @foreach ($gift as $item)
            @if ($item->status)
                <tr style="background-color: green">
                @else
                <tr style="background-color: red">
            @endif
            <td>{{ $item->id }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->kid->name }}</td>
            <td>{{ $item->status ? 'Confermato' : 'Annullato' }}</td>
            <td>
                <form action="/gift/{{ $item->id }}/edit" method="get">
                    <button>modifica</button>
                </form>
            </td>
            <td>
                <form action="/gift/{{ $item->id }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button>elimina</button>
                </form>
            </td>
            </tr>
        @endforeach
    </table>
    <br>
    <h3>Inserisci un nuovo regalo:</h3>
    <form action="/gift" method="post">
        @csrf
        <span><b>nome regalo: </b></span><input type="text" name="name"> <br>
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
    <h3>Operazioni possibili:</h3>
    <ul>
        <li><a href="/gift/api/deleteAnnullati">Elimina tutti i regali annullati</a></li>
    </ul>
    <br>
    <a href="/">Home</a>
</body>


</html>
