<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List Project</title>
</head>

<body>
    <h1>
        <center>List Project</center>
    </h1>

    <br>
    <table border="1">
        <tr>
            <th>id</th>
            <th>nome</th>
            <th>descrizione</th>
            <th colspan="2">azioni</th>
        </tr>
        @foreach ($project as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->description }}</td>
                <td>
                    <form action="/project/{{ $item->id }}/edit" method="get">
                        @csrf
                        <button>modifica</button>
                    </form>
                </td>
                <td>
                    <form action="/project/{{ $item->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button>elimina</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <br><br>
    <h3>Inserisci un nuovo progetto:</h3>
    <form action="/project" method="post">
        @csrf
        <span>nome progetto: </span><input type="text" name="name">
        <br>
        <span>description progetto: </span><input type="text" name="description">
        <button>invia</button>
    </form>
</body>

</html>
