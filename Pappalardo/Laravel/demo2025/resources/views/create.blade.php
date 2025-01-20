<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>create</title>
</head>

<body>
    <h1>
        <center>Crea</center>
    </h1>
    <form action="/projects" method="post">
        @csrf
        Titolo: <input type="text" name="title"><br>
        Descrizione: <br>
        <textarea name="description" cols="30" rows="10"></textarea>
        <br>
        <button>Invia</button>
    </form>
</body>

</html>
