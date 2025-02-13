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
        <center>edit</center>
    </h1>

    <form action="/review/{{ $review->id }}" method="post">
        @csrf
        @method('PATCH')
        <span><b>Inserisci experience_id</b></span>
        <select name="experience_id">
            @foreach ($experience as $item)
                <option value="{{ $item->id }}">{{ $item->title }}</option>
            @endforeach
        </select>> <br>
        <span><b>Inserisci user</b></span><input type="text" name="user" value="{{ $review->user }}"> <br>
        <span><b>Inserisci rating</b></span>
        <input type="range" name="rating" id="rating" min="1" max="5" step="1" value="3"
            oninput="updateValue(this.value)">
        <span id="ratingValue">3</span> <br>
        <span><b>Inserisci comment</b></span><input type="text" name="comment" value="{{ $review->comment }}"> <br>
        <button>salva</button>
    </form>

    <br>
    <ul>
        <li> <a href="/">Torna alla home</a></li>
        <li> <a href="/review">Torna alle review</a></li>
    </ul>
    <script>
        function updateValue(val) {
            document.getElementById("ratingValue").textContent = val;
        }
    </script>
</body>

</html>
