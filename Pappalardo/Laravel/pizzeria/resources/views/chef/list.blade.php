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
        <center>chef</center>
    </h1>
    <h3>Lista degli chef</h3>

    <table border="1">
        <tr>
            <th>name</th>
            <th>age</th>
            <th>level</th>
            <th colspan="2">action</th>
        </tr>
        @foreach ($chef as $c)
            <tr>
                <td>{{ $c->name }}</td>
                <td>{{ $c->age }}</td>
                <td>{{ $c->level }}</td>
                <td>
                    <form action="/chefs/{{ $c->id }}/edit" method="get">
                        <button>modifica</button>
                    </form>
                </td>
                <td>
                    <form action="/chefs/{{ $c->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button>elimina</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    <br><br>
    <h3>Inserisci uno chef</h3>
    <form action="/chefs" method="post">
        @csrf
        <span>name:</span> <input type="text" name="name"> <br>
        <span>age:</span><input type="number" name="age"> <br>
        <span>level:</span><input type="number" name="level"> <br>
        <button>Salva</button>
    </form>
    <br>
    <a href="/">Torna alla home</a>
    <br>
    <a href="/restaurants">Vai a vedere il ristorante</a>
</body>

</html>
