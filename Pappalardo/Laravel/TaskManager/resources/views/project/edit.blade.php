<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Project</title>
</head>

<body>
    <h1>
        <center>Edit Project</center>
    </h1>
    <br>
    <form action="/project/{{ $project->id }}" method="post">
        @csrf
        @method('PATCH')
        <span>nome progetto: </span><input type="text" name="name" value="{{ $project->name }}">
        <br>
        <span>description progetto: </span><input type="text" name="description" value="{{ $project->description }}">
        <button>invia</button>
    </form>
</body>

</html>
