<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>

<body>
    <h1>
        <center>List Department</center>
    </h1>

    <table border="1">
        <tr>
            <th>id</th>
            <th>nome</th>
            <th colspan="2">azioni</th>
        </tr>
        @foreach ($department as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>
                    <form action="/department/{{ $item->id }}/edit" method="get">
                        <button>modifica</button>
                    </form>
                </td>
                <td>
                    <form action="/department/{{ $item->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button>elimina</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <br>
    <form action="/department" method="post">
        @csrf
        <span>inserisci nome: </span> <input type="text" name="name"> <button>aggiungi</button>
    </form>
    <br>
    <a href="/">Torna alla home</a>
</body>

</html>
