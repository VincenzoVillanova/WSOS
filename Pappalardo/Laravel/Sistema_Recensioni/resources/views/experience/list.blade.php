<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List experience</title>
</head>

<body>
    <h1>
        <center>List experience</center>
    </h1>
    <table border="1">
        <tr>
            <th>id</th>
            <th>title</th>
            <th>description</th>
            <th>category</th>
            <th>price</th>
            <th colspan="2">actions</th>
        </tr>
        @foreach ($experience as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->title }}</td>
                <td>{{ $item->description }}</td>
                <td>{{ $item->category }}</td>
                <td>{{ $item->price }}</td>
                <td>
                    <form action="/experience/{{ $item->id }}/edit" method="get">
                        <button>modifica</button>
                    </form>
                </td>
                <td>
                    <form action="/experience/{{ $item->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button>elimina</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <br>
    <h3>Inserisci una nuova experience:</h3>
    <form action="/experience" method="post">
        @csrf
        <span><b>Inserisci title</b></span><input type="text" name="title"> <br>
        <span><b>Inserisci description</b></span><input type="text" name="description"> <br>
        <span><b>Inserisci category</b></span><input type="text" name="category"> <br>
        <span><b>Inserisci price</b></span><input type="number" name="price" min="1"> <br>
        <button>salva</button>
    </form>
    <br>
    <ul>
        <li><a href="/">Torna alla home</a></li>
        <li>
            <form action="/review/api/filterByCost" method="post">
                @csrf
                Visualizza le esperienze per categoria:
                <input type="number" name="min" min="100" max="1000" placeholder="min">
                <input type="number" name="max" min="1000" max="10000" placeholder="max">
                <button>Filtra</button>
            </form>
        </li>
    </ul>
</body>

</html>
