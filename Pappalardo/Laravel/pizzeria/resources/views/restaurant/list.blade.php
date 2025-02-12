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
        <center>ristoranti</center>
    </h1>
    <h3>Lista degli ristoranti</h3>

    <table border="1">
        <tr>
            <th>name</th>
            <th>foundation</th>
            <th>star</th>
            <th>chef</th>
            <th colspan="2">action</th>
        </tr>
        @foreach ($restaurant as $r)
            <tr>
                <td>{{ $r->name }}</td>
                <td>{{ $r->foundation }}</td>
                <td>{{ $r->star }}</td>
                <td>{{ $r->chef->name }}</td>
                <td>
                    <form action="/restaurants/{{ $r->id }}/edit" method="get">
                        <button>modifica</button>
                    </form>
                </td>
                <td>
                    <form action="/restaurants/{{ $r->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button>elimina</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    <br><br>
    <h3>Inserisci un ristorante</h3>
    <form action="/restaurants" method="post">
        @csrf
        <span>Inserisci nome ristorante</span>
        <input type="text" name="name">
        <span>Inserisci anno di fondazione</span>
        <input type="number" name="foundation">
        <span>Inserisci numero stelle</span>
        <input type="number" name="star">
        <span>Inserisci chef</span>
        <select name="chef_id">
            @foreach ($chefs as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
        <button>Invia</button>
    </form>
    <br>
    <h3>Ricerca per chef:</h3>
    <form action="/restaurants/api/findByChef" method="post">
        @csrf
        <select name="id">
            @foreach ($chefs as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
        <button>ricerca</button>
    </form>
    <br>
    <h3>Elimina tutti i ristoranti:</h3>
    <form action="/restaurants/api/deleteAllRestaurants" method="get">
        <button>elimina tutto</button>
    </form>
    <br>
    <a href="/">Torna alla home</a>
    <br>
    <a href="/chefs">Vai a vedere gli chef</a>
</body>

</html>
