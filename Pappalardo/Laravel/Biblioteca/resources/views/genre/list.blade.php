<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home Genre</title>
</head>

<body>
    <h1>
        <center>Home Genre</center>
    </h1>
    <table border="1">
        <tr>
            <th>id</th>
            <th>nome</th>
            <th colspan="2">azioni</th>
        </tr>
        <tr>
            @foreach ($genre as $g)
                <td>{{ $g->id }}</td>
                <td>{{ $g->name }}</td>
                <td>
                    <form action="/genres/{{ $g->id }}/edit" method="get">
                        <button>modifica</button>
                    </form>
                </td>
                <td>
                    <form action="/genres/{{ $g->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button>elimina</button>
                    </form>
                </td>
            @endforeach
        </tr>
    </table>

    <br>
    <h3>inserisci un nuovo genere:</h3>
    <form action="/genres" method="post">
        @csrf
        <span>inserici nome</span> <input type="text" name="name">
        <button>invia</button>
    </form>
</body>

</html>
