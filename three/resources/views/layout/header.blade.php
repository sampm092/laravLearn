<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.0.0/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
    <!-- MDB -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">
    <!-- AOS ANIMATION -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>
</head>

<body>

    <header id="header" class="p-3 text-white shadows bg-dark">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="{{route('welcome')}}"
                            class="navbar-brand fw-light text-warning">{{ config('app.name') }}</a></li>
                    <li><a href="{{route('bookView')}}" class="nav-link px-2 text-warning">Home</a></li>
                    <li><a href="{{route('about')}}" class="nav-link px-2 text-warning">About</a></li>
                    @if (Auth::user()->is_admin)
                        <li><a href="{{route('admin.dashboard')}}" class="nav-link px-2 text-warning">Admin</a></li>
                    @endif
                </ul>

                <div class="text-end ml-auto">
                    <form action="{{route('logout')}}" method="POST" class="m-auto">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger btn-dark2 me-2">Logout</button>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </header>
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


        <!-- include memanggil isi file layout\navbar  -->

        <!-- yield menjadikan Section konten yang ada di profile -->
        @yield('content') 

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    </div>


    @extends('layout.footer')

</body>

</html>