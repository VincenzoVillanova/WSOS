<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home Book</title>
</head>

<body>
    <h1>
        <center>Home Book</center>
    </h1>
    <table border="1">
        <tr>
            <th>id</th>
            <th>nome</th>
            <th>autore</th>
            <th>anno</th>
            <th>genere</th>
            <th colspan="2">azioni</th>
        </tr>
        <tr>
            @foreach ($book as $b)
                <td>{{ $b->id }}</td>
                <td>{{ $b->name }}</td>
                <td>{{ $b->author }}</td>
                <td>{{ $b->year }}</td>
                <td>{{ $b->genre->name }}</td>
                <td>
                    <form action="/books/{{ $b->id }}/edit" method="get">
                        <button>modifica</button>
                    </form>
                </td>
                <td>
                    <form action="/books/{{ $b->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button>elimina</button>
                    </form>
                </td>
            @endforeach
        </tr>
    </table>

    <br>
    <h3>inserisci un nuovo libro:</h3>
    <form action="/books" method="post">
        @csrf
        <span>inserici nome</span> <input type="text" name="name">
        <br>
        <span>inserici autore</span> <input type="text" name="author">
        <br>
        <span>inserici anno</span> <input type="number" name="year">
        <br>
        <select name="genre_id">
            @foreach ($genre as $g)
                <option value="{{ $g->id }}">{{ $g->name }}</option>
            @endforeach
        </select>
        <button>invia</button>
    </form>
</body>

</html>
