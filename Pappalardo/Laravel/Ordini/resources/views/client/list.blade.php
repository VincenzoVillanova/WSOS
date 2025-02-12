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
        <center>Home Client</center>
    </h1>
    <table border="1">
        <tr>
            <th>id</th>
            <th>nome</th>
            <th>città</th>
            <th colspan="2">azioni</th>
        </tr>
        @foreach ($client as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->city }}</td>
                <td>
                    <form action="/client/{{ $item->id }}/edit" method="get">
                        <button>modifica</button>
                    </form>
                </td>
                <td>
                    <form action="/client/{{ $item->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button>elimina</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <br>
    <h3>Inserisci un nuovo client</h3>
    <form action="/client" method="post">
        @csrf
        <span>inserisci nominativo:</span><input type="text" name="name"> <br>
        <span>inserisci città:</span><input type="text" name="city"> <button>Invia</button>
    </form>
</body>

</html>
