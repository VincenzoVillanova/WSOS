<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit work</title>
</head>

<body>
    <h1>
        <center>Edit work</center>
    </h1>
    <form action="/work/{{ $work->id }}" method="post">
        @csrf
        @method('PATCH')
        <span>nome:</span><input type="text" name="name" value="{{ $work->name }}">
        <span>salary:</span><input type="number" name="salary" value="{{ $work->salary }}">
        <span>number_dip:</span><input type="text" name="number_dip" value="{{ $work->number_dip }}">
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
    <a href="/work">Torna ai lavori</a>
</body>

</html>
