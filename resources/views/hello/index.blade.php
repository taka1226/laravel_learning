<body>
    <h1>Hello/Index</h1>
    <p>{!!$msg!!}</p>
    <div>
        <form action="/hello" method="post">
            @csrf
            <input type="submit">
        </form>
    </div>
    <table border="1">
        @foreach($data as $item)
        <tr>
            <td>{{ $item }}</td>
        </tr>
        @endforeach
    </table>
    <hr>
</body>
