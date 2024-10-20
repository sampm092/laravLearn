<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>

<body style="background-color: #123456">

    <div class="container mt-5" style="padding: inherit;border-radius: 5px;">
        <!-- include memanggil isi file layout\navbar  -->
        @include('layout.navbar')

        <!-- yield menjadikan Section konten yang ada di profile -->
        @yield('content') 

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    </div>


    <footer class="bd-footer py-4 py-md-5 mt-5 bg-body-tertiary">
        <div> footer</div>
    </footer>

</body>

</html>