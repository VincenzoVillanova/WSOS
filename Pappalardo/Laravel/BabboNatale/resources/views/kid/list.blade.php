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
        <center>Home kid</center>
    </h1>
    <table border="1" style="color: white; background-color:black">
        <tr>
            <th>id</th>
            <th>nome</th>
            <th>è stato bravo?</th>
            <th colspan="2">azioni</th>
        </tr>
        @foreach ($kid as $item)
            @if ($item->good)
                <tr style="background-color: green">
                @else
                <tr style="background-color: red">
            @endif
            <td>{{ $item->id }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->good ? 'si' : 'no' }}</td>
            <td>
                <form action="/kid/{{ $item->id }}/edit" method="get">
                    <button>modifica</button>
                </form>
            </td>
            <td>
                <form action="/kid/{{ $item->id }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button>elimina</button>
                </form>
            </td>
            </tr>
        @endforeach
    </table>
    <br>
    <h3>Inserisci un nuovo bambino:</h3>
    <form action="/kid" method="post">
        @csrf
        <span><b>nome: </b></span><input type="text" name="name"> <br>
        <span><b>è stato buono? </b></span>
        <select name="good">
            <option value="0">NO</option>
            <option value="1">SI</option>
        </select>
        <button>Invia</button>
    </form>
    <h3>Operazioni possibili:</h3>
    <ul>
        <li><a href="/kid/api/allGood">Diventano tutti buoni</a></li>
        <li><a href="/kid/api/allNoGood">Diventano tutti cattivi</a></li>
        <li><a href="/kid/api/deleteCattivi">Elimina tutti i bambini cattivi</a></li>
    </ul>
    <br>
    <a href="/">Home</a>
</body>


</html>
