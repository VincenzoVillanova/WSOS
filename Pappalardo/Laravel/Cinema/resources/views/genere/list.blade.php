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
        <center>Home Generi</center>
    </h1>
    <table border="1">
        <tr>
            <th>id</th>
            <th>nome</th>
            <th colspan="2">azioni</th>
        </tr>
        @foreach ($genere as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>
                    <form action="/genere/{{ $item->id }}/edit" method="get">
                        <button>modifica</button>
                    </form>
                </td>
                <td>
                    <form action="/genere/{{ $item->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button>elimina</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    <br>
    <h3>Inserisci un nuovo genere:</h3>
    <form action="/genere" method="post">
        @csrf
        <span>Inserisci nome genere: </span> <input type="text" name="name"> <button>Invia</button>
    </form>
    <br>
    <a href="/">Torna alla home</a>
</body>

</html>
