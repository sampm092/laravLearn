<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <style>
        .book-cover {
            width: fit-content;
            height: 150px;
            object-fit: fill;
            border-radius: 20px;
        }
    </style>
    <table>
        <tr>
            <th>Cover</th>
            <th>Title</th>
            <th>Author</th>
            <th>Genre</th>
        </tr>
        @foreach($customers['data'] as $customer)
            <tr>
                <td><img class="book-cover" src="{{ $customer['cover'] }}" alt=""></td>
                <td>{{ $customer['title'] }}</td>
                <td>{{ $customer['author'] }}</td>
                <td>{{ $customer['genre'] }}</td>
            </tr>
        @endforeach
    </table>


</body>

</html>