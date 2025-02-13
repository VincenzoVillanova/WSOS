<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List</title>
</head>

<body>
    <h1>
        <center>List</center>
    </h1>
    <table border="1">
        <tr>
            <th>title</th>
            <th>author</th>
            <th>genre</th>
            <th>available_copies</th>
            <th colspan="3">azioni</th>
        </tr>

        @foreach ($book as $item)
            <tr>
                <td>{{ $item->title }}</td>
                <td>{{ $item->author }}</td>
                <td>{{ $item->genre }}</td>
                <td>{{ $item->available_copies }}</td>
                <td>
                    <form action="/book/{{ $item->id }}/edit" method="get">
                        <button>edit</button>
                    </form>
                </td>
                <td>
                    <form action="/book/{{ $item->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button>delete</button>
                    </form>
                </td>
                <td>
                    <form action="/book/api/{{ $item->id }}/filter" method="get">
                        <button>filter</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <h3>Inserisci un nuovo libro:</h3>
    <form action="/book" method="post">
        @csrf
        <span><b>inserisci title:</b></span> <input type="text" name="title"> <br>
        <span><b>inserisci author:</b></span> <input type="text" name="author"> <br>
        <span><b>inserisci genre:</b></span> <input type="text" name="genre"> <br>
        <span><b>inserisci available_copies:</b></span> <input type="number" name="available_copies"> <br>
        <button>salva</button>
    </form>
    <ul>
        <li><a href="/">Torna alla home!</a></li>
    </ul>
</body>

</html>
