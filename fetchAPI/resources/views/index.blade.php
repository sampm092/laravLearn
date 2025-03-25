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
            <!-- <th>Cover</th> -->
            <th>Title</th>
            <th>Author</th>
            <th>Genre</th>
        </tr>
        @if(is_array($customers))
            @foreach($customers as $customer)
                <!-- The 'title' is inside the 'data' array, and
                    The 'data' array is inside $customers so we use $customers['data']-->
                <tr>

                    <td>{{ $customer['name'] }}</td>
                    <td>{{ $customer['type'] }}</td>
                    <td>{{ $customer['available'] }}</td>
                </tr>
            @endforeach
        @else
            <p>No data available</p>
        @endif
    </table>


</body>

</html>