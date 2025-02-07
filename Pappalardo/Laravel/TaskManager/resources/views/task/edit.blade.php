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
    <form action="/task/{{ $task->id }}" method="post">
        @csrf
        @method('PATCH')
        <span>progetto di riferimento: </span><select name="project_id">
            @foreach ($project as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
        <br>
        <span>title task: </span><input type="text" name="title" value="{{ $task->title }}"> <br>
        <span>description task: </span><input type="text" name="description" value="{{ $task->description }}">
        <span>data scadenza task: </span><input type="date" name="date" value="{{ $task->date }}">
        <span>completato?</span>
        <select name="completed">
            <option value="0">NO</option>
            <option value="1">SI</option>
        </select>
        <button>invia</button>
    </form>
</body>

</html>
