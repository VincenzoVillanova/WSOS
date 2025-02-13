<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>
</head>

<body>
    <h1>
        <center>Edit</center>
    </h1>
</body>
<form action="/loan/{{ $loan->id }}" method="post">
    @csrf
    @method('PATCH')
    <span><b>inserisci libro:</b></span>
    <select name="book_id">
        @foreach ($book as $item)
            <option value="{{ $item->id }}">{{ $item->title }}</option>
        @endforeach
    </select> <br>
    <span><b>inserisci name:</b> <input type="text" name="name" value="{{ $loan->name }}"><br>
        <span><b>inserisci email:</b> <input type="text" name="email" value="{{ $loan->email }}"><br>
            <span><b>inserisci loan_date:</b> <input type="date" name="loan_date" value="{{ $loan->loan_date }}"><br>
                <span><b>inserisci return_date:</b> <input type="date" name="return_date"
                        value="{{ $loan->return_date }}"><br>
                    <span><b>restituito?:</b> <select name="returned">
                            <option value="0">NO</option>
                            <option value="1">SI</option>
                        </select> <br>
                        <button>salva</button>
</form>
<ul>
    <li><a href="/loan">Torna ai loan!</a></li>
    <li><a href="/">Torna alla home!</a></li>
</ul>

</html>
