<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h3>Modifica un esame</h3>
    <form action="/exams/{{ $exam->id }}" method="post">
        @csrf
        @method('PATCH')
        <span>Nome:</span><input type="text" name="name" value="{{ $exam->name }}"><br>
        <span>Cfu:</span><input type="number" name="cfu" value="{{ $exam->cfu }}"><br>
        <span>Voto:</span><input type="number" name="mark" min="18"
            max="33"value="{{ $exam->mark }}"><br>
        <button>modifica</button>
    </form>
</body>

</html>
