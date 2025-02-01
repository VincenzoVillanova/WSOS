<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List Team</title>
</head>

<body>
    <h1>
        <center>List Team</center>
    </h1>
    <table border="1">
        <tr>
            <th>nome</th>
            <th>punti</th>
            <th colspan="2">azioni</th>
        </tr>
        @foreach ($teams as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->point }}</td>
                <td>
                    <form action="/team/{{ $item->id }}/edit" method="get">
                        @csrf
                        <button>modifica</button>
                    </form>
                </td>
                <td>
                    <form action="/team/{{ $item->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button>elimina</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <br><br>
    <form action="/team" method="post">
        @csrf
        <span>nome squadra: </span> <input type="text" name="name">
        <span> punti squadra: </span> <input type="text" name="point">
        <button>invia</button>
    </form>
    <a href="/team/order">Per vedere la classifica in ordine</a>
    <br>
    <a href="/team/filterPoint">Per vedere la classifica con coloro che hanno più punti</a>
    <br>
    <a href="/team/deletePoint">Eliminare le squadre con punti < di 45</a>
</body>

</html>
