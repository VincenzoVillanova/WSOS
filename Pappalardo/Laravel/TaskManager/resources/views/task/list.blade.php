<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List task</title>
</head>

<body>
    <h1>
        <center>List task</center>
    </h1>

    <br>
    <table border="1">
        <tr>
            <th>id</th>
            <th>nome progetto</th>
            <th>titolo task</th>
            <th>descrizione</th>
            <th>data scadenza</th>
            <th>completato?</th>
            <th colspan="2">azioni</th>
        </tr>
        @foreach ($task as $item)
            @if ($item->date == '2025-02-04')
                <tr style="background-color: red">
                @else
                <tr>
            @endif

            <td>{{ $item->id }}</td>
            <td>{{ $item->project->name }}</td>
            <td>{{ $item->title }}</td>
            <td>{{ $item->description }}</td>
            <td>{{ $item->date }}</td>
            <td>{{ $item->completed ? 'SI' : 'NO' }}</td>
            <td>
                <form action="/task/{{ $item->id }}/edit" method="get">
                    @csrf
                    <button>modifica</button>
                </form>
            </td>
            <td>
                <form action="/task/{{ $item->id }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button>elimina</button>
                </form>
            </td>
            </tr>
        @endforeach
    </table>
    <br><br>
    <h3>Inserisci un nuovo progetto:</h3>
    <form action="/task" method="post">
        @csrf
        <span>progetto di riferimento: </span><select name="project_id">
            @foreach ($project as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
        <br>
        <span>title task: </span><input type="text" name="title"> <br>
        <span>description task: </span><input type="text" name="description">
        <span>data scadenza task: </span><input type="date" name="date">
        <span>completato?</span>
        <select name="completed">
            <option value="0">NO</option>
            <option value="1">SI</option>
        </select>
        <button>invia</button>
    </form>
    <br><br>
    <h3>Ricerca per progetto:</h3>
    <form action="/task/api/serchByProject" method="post">
        @csrf
        <span>selezionare progetto</span>
        <select name="id">
            @foreach ($project as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
        <button>ricerca</button>
    </form>
</body>

</html>
