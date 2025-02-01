<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>list team</title>
</head>

<body>
    <h1>
        <center>List Team</center>
    </h1>

    <table border="1">
        <tr>
            <th>id</th>
            <th>nome</th>
            <th>anno</th>
            <th colspan="2">azioni</th>
        </tr>

        @foreach ($teams as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->date }}</td>
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
    <a href="/team/insert">Inserire un nuovo team</a>
</body>

</html>
