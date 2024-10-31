@extends('layout.html')

<body class="background inter-font"></body>
<style>
    .inter-font {
        font-family: "Inter", "Avenir", lucida grande, tahoma, verdana, arial, sans-serif;
        font-optical-sizing: auto;
        font-style: normal;
    }

    #hover1 {
        color: #212529;
        background-color: #ffc107;
        border-color: #ffc107;
        box-shadow: 0 0 5px #ffc107;
    }

    #hover1:hover {
        color: #ffc107;
        border-color: #ffc107;
        background-color: transparent;
        box-shadow: 0 0 5px #656459;
    }

    #hover2 {
        color: #ffc107;
        background-color: transparent;
        border-color: #ffc107;
        box-shadow: 0 0 5px #656459;

    }

    #hover2:hover {
        color: #212529;
        background-color: #ffc107;
        border-color: #ffc107;
        box-shadow: 0 0 5px #ffc107;
    }

    .shadows {
        box-shadow: 0 .1rem 1rem #000 !important;
    }

    .background {
        background:
            linear-gradient(135deg, #1b1b1f 25%, #130c0b 25%, #130c0b 50%, #1b1b1f 50%, #1b1b1f 75%, #130c0b 75%, #130c0b 100%, #1b1b1f 100%);
        background-size: 4rem 4rem;
        animation: pattern 30s linear infinite;
    }

    @keyframes pattern {
        to {
            background-position: 2rem;
        }

    }
</style>
<header class="p-3 text-white shadows" style="background-color: #130c0b;">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="{{route('welcome')}}" class="navbar-brand fw-light text-warning">{{ config('app.name') }}</a></li>
                @guest
                <li><a href="{{route('welcome')}}" class="nav-link px-2 text-warning">Home</a></li>
                @endguest
                @auth
                <li><a href="{{route('bookView')}}" class="nav-link px-2 text-warning">Home</a></li>
                @endauth
                <li><a href="#" class="nav-link px-2 text-warning">About</a></li>
            </ul>
            <div class="text-end ms-auto" style="margin-left: auto">
                @guest
                    <a id="hover2" type="button" href="{{ route('login') }}"
                        class="btn btn-outline-warning btn-dark me-2">Login</a>
                    <a id="hover1" type="button" href="{{ route('regist') }}" class=" btn me-2 ml-2">Register</a>
                @endguest
                @auth
                <div class="text-end ms-auto" style="margin-left: auto">
                    <a type="button" href="{{route('bookView')}}" class="alt-btn btn-outline-warning btn-dark mr-2">
                        <img src="{{Storage::url('public/profile/'.Auth::user()->picture)}}"
                            alt="" style="width: 35px;height:35px;padding:0">
                    </a>
                    <a type="button" href="{{route('bookView')}}" class="our-orange">
                        {{Auth::user()->username}}
                    </a>
                    <!-- <a id="hover2" type="button" href="#" class="btn btn-outline-warning btn-dark me-2">Logout</a> -->
                </div>
                @endauth
            </div>
        </div>
    </div>
</header>
<div class="content" style="height:82vh">
    <div class="col mt-5 col-md-12 text-center card-body" style="color: #ffc107;">
        <h4 class="">Welcome to</h4>
        <h1 class="bold display-2">MyBookList</h1>
        <p class="lead" style="width: 80%; margin: 40px auto">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Phasellus rhoncus
            felis quis arcu tempus sagittis. Etiam odio quam, ultrices sit amet faucibus a, rhoncus eu turpis. Integer
            aliquet, diam id pellentesque ultrices, dolor arcu faucibus sem, at fermentum sapien augue et orci.
            Phasellus suscipit libero non est aliquet bibendum. Morbi consequat suscipit dapibus. Sed eu egestas sapien,
            ut accumsan lacus. Quisque libero lorem, venenatis at ligula id, volutpat semper odio. Morbi sed lorem vel
            purus interdum cursus. Aenean ac est eget felis dapibus condimentum. Pellentesque sit amet convallis nisi,
            sit amet ultrices orci. Nullam rutrum magna eu sagittis semper. Nullam vehicula pharetra vulputate. Aliquam
            non dignissim erat, eu vestibulum mauris. Curabitur aliquam dapibus urna, eget tincidunt dui congue sed.
            Nullam fringilla est leo, nec tincidunt mi vulputate fringilla.</p>
    </div>
</div>