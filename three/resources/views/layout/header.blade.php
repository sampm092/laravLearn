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
<style>
    html::-webkit-scrollbar {
        border-left: 1px solid black;
    }

    html::-webkit-scrollbar-track {
        background-color: #ffc107;
    }

    html::-webkit-scrollbar-thumb {
        border: 3px solid #212529;
        background-color: #130c0b;
        border-radius: 1px;
    }
</style>

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


        <footer class="py-3 bg-dark shadow" style="border-top:1px solid grey">
            <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Home</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Features</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Pricing</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">FAQs</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">About</a></li>
            </ul>
            <p class="text-center text-body-secondary" style="color:white">© 2024 Samuel P.M. </p>
        </footer>

</body>

</html>