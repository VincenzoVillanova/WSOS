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
        <center>Home League</center>
    </h1>
    <table border="1">
        <tr>
            <th>descrizione</th>
            <th>link</th>
            <th colspan="2">azioni</th>
        </tr>
        @foreach ($leghe as $l)
            <tr>
                <td>{{ $l->description }}</td>
                <td>{{ $l->link }}</td>
                <td>modifica</td>
                <td>
                    <form action="/leghe/{{ $l->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button>elimina</button>
                    </form>
                </td>
            </tr>
        @endforeach

    </table>
    <br><br>
    <form action="/leghe" method="post">
        @csrf
        <span>descrizione: </span> <input type="text" name="description"> <br>
        <span>link: </span> <input type="text" name="link"> <br>
        <button>invia</button>
    </form>
</body>

</html>
