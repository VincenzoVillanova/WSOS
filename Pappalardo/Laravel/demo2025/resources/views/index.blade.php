<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Progetti</title>
</head>

<body>
    <h1 style="text-align: center;">Progetti</h1>

    <table border="1">
        <tr>
            <th>id</th>
            <th>titolo</th>
            <th>descrizione</th>
            <th colspan="2">Azioni</th>
        </tr>
        @foreach ($progetti as $prog)
            <tr>
                <td>{{ $prog->id }}</td>
                <td>{{ $prog->title }}</td>
                <td>{{ $prog->description }}</td>
                <td>
                    <form action="/projects/{{ $prog->id }}/edit" method="get">
                        <button type="submit">Modifica</button>
                    </form>
                </td>
                <td>
                    <form action="/projects/{{ $prog->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Elimina</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <br>

    <a href="/projects/create">Crea un nuovo progetto</a>
</body>

</html>
