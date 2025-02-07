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
        <center>Home Film</center>
    </h1>
    <table border="1">
        <tr>
            <th>id</th>
            <th>nome</th>
            <th>autore</th>
            <th>anno</th>
            <th>genere</th>
            <th colspan="2">azioni</th>
        </tr>
        @foreach ($film as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->author }}</td>
                <td>{{ $item->year }}</td>
                <td>{{ $item->genere->name }}</td>
                <td>
                    <form action="/film/{{ $item->id }}/edit" method="get">
                        <button>modifica</button>
                    </form>
                </td>
                <td>
                    <form action="/film/{{ $item->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button>elimina</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    <br>
    <h3>Inserisci un nuovo film:</h3>
    <form action="/film" method="post">
        @csrf
        <span>Inserisci nome film: </span> <input type="text" name="name"> <br>
        <span>Inserisci autore film: </span> <input type="text" name="author"> <br>
        <span>Inserisci anno film: </span> <input type="number" name="year"> <br>
        <span>Inserisci genere film: </span>
        <select name="genere_id">
            @foreach ($genere as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
        <button>Invia</button>
    </form>
    <br>
    <h3>Filtra per genere:</h3>
    <form action="/genere/api/serchByGenere" method="post">
        @csrf
        <span>Seleziona genere:</span>
        <select name="id">
            @foreach ($genere as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
        <button>Ricerca</button>
    </form>
    <br>
    <h3>Incrementa anno dei film:</h3>
    <form action="/genere/api/incrementYear" method="get">
        <button>Incrementa</button>
    </form>
    <br>
    <h3>Elimina per genere:</h3>
    <form action="/genere/api/deleteByGenere" method="post">
        @csrf
        <span>Seleziona genere:</span>
        <select name="id">
            @foreach ($genere as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
        <button>Elimina</button>
    </form>
    <br>
    <a href="/">Torna alla home</a>
</body>

</html>
