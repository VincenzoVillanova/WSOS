<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List work</title>
</head>

<body>
    <h1>
        <center>List work</center>
    </h1>
    <table border="1">
        <tr>
            <th>id</th>
            <th>nome</th>
            <th>salario</th>
            <th>numero lavoratori</th>
            <th>disponibili</th>
            <th>azienda</th>
            <th colspan="2">azioni</th>
        </tr>
        @foreach ($work as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->salary }}</td>
                <td>{{ $item->number_dip }}</td>
                <td>{{ $item->availability ? 'si' : 'no' }}</td>
                <td>{{ $item->department->name }}</td>
                <td>
                    <form action="/work/{{ $item->id }}/edit" method="get">
                        <button>modifica</button>
                    </form>
                </td>
                <td>
                    <form action="/work/{{ $item->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button>elimina</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <br>
    <h3>Inserisci un nuovo lavoro:</h3>
    <form action="/work" method="post">
        @csrf
        <span>nome:</span><input type="text" name="name">
        <span>salary:</span><input type="number" name="salary">
        <span>number_dip:</span><input type="text" name="number_dip">
        <span>availability:</span>
        <select name="availability">
            <option value="0">no</option>
            <option value="1">si</option>
        </select>
        <span>azienda:</span>
        <select name="department_id">
            @foreach ($department as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
        <button>Aggiungi</button>
    </form>
    <br>
    <h3>Ricerca per Azienda:</h3>
    <form action="/work/api/searchByDepartments" method="post">
        @csrf
        <select name="id">
            @foreach ($department as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
        <button>Ricerca</button>
    </form>
    <br>
    <a href="/work">Reset</a>
    <br>
    <a href="/">Torna alla home</a>
</body>

</html>
