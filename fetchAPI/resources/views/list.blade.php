<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <select id="cars">
            @foreach($customers['data'] as $book)
            <option value="{{ $book['title'] }}">{{ $book['title'] }}</option>
            @endforeach
        </select>

</body>

</html>