<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit department</title>
</head>

<body>
    <h1>
        <center>Edit department</center>
    </h1>
    <form action="/department/{{ $department->id }}" method="post">
        @csrf
        @method('PATCH')
        <span>inserisci nome: </span> <input type="text" name="name" value="{{ $department->name }}">
        <button>modifica</button>
    </form>
    <br>
    <a href="/department">Torna ai department</a>
</body>

</html>
