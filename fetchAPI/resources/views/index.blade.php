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
            <!-- The 'title' is inside the 'data' array, and
            The 'data' array is inside $customers so we use $customers['data']-->
            <tr>
                <td>{{ $customer['name'] }}</td>
                <td>{{ $customer['address'] }}</td>
                <td>{{ $customer['email'] }}</td>
                <td>{{ $customer['city'] }}</td>
            </tr>
        @endforeach
    </table>


</body>

</html>