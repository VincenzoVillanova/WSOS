<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List Player</title>
</head>

<body>
    <h1>
        <center>Lista Calciatori</center>
    </h1>
    <table border="1">
        <tr>
            <th>nome</th>
            <th>età</th>
            <th>infortunato</th>
            <th>squadra</th>
            <th colspan="2">azioni</th>
        </tr>
        @foreach ($players as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->age }}</td>
                <td>{{ $item->injured ? 'si' : 'no' }}</td>
                <td>{{ $item->team->name }}</td>
                <td>
                    <form action="/player/{{ $item->id }}/edit" method="get">
                        @csrf
                        <button>modifica</button>
                    </form>
                </td>
                <td>
                    <form action="/player/{{ $item->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button>elimina</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <br><br>
    <form action="/player" method="post">
        @csrf
        <span>nome calciatore: </span><input type="text" name="name">
        <br>
        <span>età calciatore: </span><input type="number" name="age">
        <span>infortunato:</span>
        <select name="injured">
            <option value="0">no</option>
            <option value="1">si</option>
        </select>
        <br>
        <span>squadra: </span>
        <select name="team_id">
            @foreach ($teams as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
        <button>invia</button>
    </form>
</body>

</html>
