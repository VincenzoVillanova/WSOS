<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit kid</title>
</head>

<body>
    <h1>
        <center>Edit kid</center>
    </h1>
    <form action="/kid/{{ $kid->id }}" method="post">
        @csrf
        @method('PATCH')
        <span><b>nome: </b></span><input type="text" name="name" value="{{ $kid->name }}"> <br>
        <span><b>è stato buono? </b></span>
        <select name="good">
            <option value="0">NO</option>
            <option value="1">SI</option>
        </select>
        <button>Invia</button>
    </form>
    <a href="/kid">Torna ai bambini</a>
</body>

</html>
