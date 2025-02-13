<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body>
    <h1>
        <center>List review</center>
    </h1>
    <table border="1">
        <tr>
            <th>id</th>
            <th>experience</th>
            <th>user</th>
            <th>rating</th>
            <th>comment</th>
            <th colspan="2">actions</th>
        </tr>
        @foreach ($review as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->experience->title }}</td>
                <td>{{ $item->user }}</td>
                <td>{{ $item->rating }}</td>
                <td>{{ $item->comment }}</td>
                <td>
                    <form action="/review/{{ $item->id }}/edit" method="get">
                        <button>modifica</button>
                    </form>
                </td>
                <td>
                    <form action="/review/{{ $item->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button>elimina</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <br>
    <h3>Inserisci una nuova review:</h3>
    <form action="/review" method="post">
        @csrf
        <span><b>Inserisci experience</b></span>
        <select name="experience_id">
            @foreach ($experience as $item)
                <option value="{{ $item->id }}">{{ $item->title }}</option>
            @endforeach
        </select> <br>
        <span><b>Inserisci user</b></span><input type="text" name="user"> <br>
        <span><b>Inserisci rating</b></span>
        <input type="range" name="rating" id="rating" min="1" max="5" step="1" value="3"
            oninput="updateValue(this.value)">
        <span id="ratingValue">3</span> <br>
        <span><b>Inserisci comment</b></span><input type="text" name="comment"> <br>
        <button>salva</button>
    </form>
    <br>
    <ul>
        <li><a href="/">Torna alla home</a></li>
    </ul>
    <script>
        function updateValue(val) {
            document.getElementById("ratingValue").textContent = val;
        }
    </script>

</body>

</html>
