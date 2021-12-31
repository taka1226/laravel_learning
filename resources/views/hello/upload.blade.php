<body>
    <form enctype="multipart/form-data" method="post" action="/upload">
        @csrf
        <input type="file" name="csv_file">
        <input type="submit" value="送信">
    </form>
</body>
