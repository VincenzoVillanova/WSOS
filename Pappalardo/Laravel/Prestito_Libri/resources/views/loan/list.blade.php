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
            <th>nome libro</th>
            <th>name</th>
            <th>email</th>
            <th>loan_date</th>
            <th>return_date</th>
            <th>returned</th>
            <th colspan="2">azioni</th>
        </tr>
        @foreach ($loan as $item)
            <tr>
                <td>{{ $item->book->title }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->loan_date }}</td>
                <td>{{ $item->return_date }}</td>
                <td>{{ $item->returned }}</td>
                <td>
                    <form action="/loan/{{ $item->id }}/edit" method="get">
                        <button>edit</button>
                    </form>
                </td>
                <td>
                    <form action="/loan/{{ $item->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button>delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <br>
    <h3>Inserisci un nuovo prestito:</h3>
    <form action="/loan" method="post">
        @csrf
        <span><b>inserisci libro:</b></span>
        <select name="book_id">
            @foreach ($book as $item)
                <option value="{{ $item->id }}">{{ $item->title }}</option>
            @endforeach
        </select> <br>
        <span><b>inserisci name:</b> <input type="text" name="name"><br>
            <span><b>inserisci email:</b> <input type="text" name="email"><br>
                <span><b>inserisci loan_date:</b> <input type="date" name="loan_date"><br>
                    <span><b>inserisci return_date:</b> <input type="date" name="return_date"><br>
                        <span><b>restituito?</b> <select name="returned">
                                <option value="0">NO</option>
                                <option value="1">SI</option>
                            </select> <br>
                            <button>salva</button>
    </form>
    <br>
    <h3>Operazioni possibili:</h3>
    <ul>
        <li>
            <form action="/loan/api/seachByBook" method="post">
                @csrf
                <span>Cerca per libro:</span>
                <select name="id">
                    @foreach ($book as $item)
                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                    @endforeach
                </select>
                <button>Ricerca</button>
            </form>
        </li>
    </ul>
    <ul>
        <li><a href="/">Torna alla home!</a></li>
    </ul>
</body>

</html>
