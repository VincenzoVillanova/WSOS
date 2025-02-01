<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>edit</title>
</head>

<body>
    <h1>
        <center>edit genre</center>
    </h1>
    <form action="/genres/{{ $genre->id }}" method="post">
        @csrf
        @method('PUT')
        <span>inserici nome</span> <input type="text" value="{{ $genre->name }}" name="name">
        <button>invia</button>
    </form>
</body>

</html>
