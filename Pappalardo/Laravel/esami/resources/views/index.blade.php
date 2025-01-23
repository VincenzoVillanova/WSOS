<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Esami</title>
</head>

<body>
    <h1>
        <center>Esami Sasso Laravel</center>
    </h1>

    <table border="1">
        <tr>
            <th>nome</th>
            <th>cfu</th>
            <th>voto</th>
            <th colspan="2">azioni</th>
        </tr>
        @foreach ($exam as $e)
            <tr>
                <td>{{ $e->name }}</td>
                <td>{{ $e->cfu }}</td>
                <td>{{ $e->mark }}</td>
                <td>
                    <form action="exams/{{ $e->id }}/edit" method="get">
                        <button>modifica</button>
                    </form>
                </td>
                <td>
                    <form action="exams/{{ $e->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button>elimina</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <br><br>
    <h3>Inserisci un esame</h3>
    <form action="/exams" method="post">
        @csrf
        <span>Nome:</span><input type="text" name="name"><br>
        <span>Cfu:</span><input type="number" name="cfu"><br>
        <span>Voto:</span><input type="number" name="mark" min="18" max="33"><br>
        <button>Aggiungi</button>
    </form>
</body>

</html>
