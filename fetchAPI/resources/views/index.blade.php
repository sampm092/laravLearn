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
    <div>
        @if(is_array($customers))
            @foreach($customers['data'] as $customer)
                <!-- The 'title' is inside the 'data' array, and
                                    The 'data' array is inside $customers so we use $customers['data']-->
                <h1>{{ $customer['title'] }}</h1>
                <p> {{ $customer['author'] }}</p>
                <p>Genre : {{ $customer['genre'] }}</p>
                <p>  {{ $customer['description'] }}</p>
            @endforeach
        @else
            <p>No data available</p>
        @endif

    </div>

</body>

</html>