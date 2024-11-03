@extends('layout.html')

<body class="inter-font">
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
                linear-gradient(180deg, #8b6a06, #1b1b1f, #1b1b1f, #1b1b1f, #8b6a06);
            /* background-size: 8rem 25%; */
            /* background-color: #8b6a06; */
            animation: pattern 5s infinite alternate linear;
        }

        .spin {
            animation: spin 30s infinite alternate linear;
        }

        .o-header {
            position: fixed;
            /* Fixes the element to the viewport */
            top: 0;
            /* Aligns it to the top */
            left: 0;
            width: 100%;
            /* Makes it full width */
            z-index: 3000;
            /* Ensures it's on top of other elements */
        }

        @keyframes pattern {
            to {
                background-position: 2rem;
            }

        }

        @keyframes spin {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }
    </style>
    <header class="p-3 text-white shadows o-header" style="background-color: #130c0b; ">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="{{route('welcome')}}"
                            class="navbar-brand fw-light text-white">{{ config('app.name') }}</a>
                    </li>
                    @guest
                        <li><a href="#welcome" class="nav-link px-2 text-white">Home</a></li>
                    @endguest
                    @auth
                        <li><a href="{{route('bookView')}}" class="nav-link px-2 text-white">Home</a></li>
                    @endauth
                    <li><a href="#about" class="nav-link px-2 text-white">About Me</a></li>
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
                                <img src="{{Storage::url('public/profile/' . Auth::user()->picture)}}" alt=""
                                    style="width: 35px;height:35px;padding:0">
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
    <div id="welcome" class="content background" style="min-height:100vh; display: flex;">
        <div class="col col-md-12 card-body" style="color: #fff;width: 50%; margin: auto 4rem !important;">
            <h4 data-aos="zoom-in" data-aos-duration="1000">Welcome to</h4>
            <h1 class="display-2" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="200"
                style="font-weight: 600">MyBookList</h1>
            <p class="lead" style="width: 90%" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="400">Hello
            </p>
        </div>
        <div style="width:50%" class="col col-md-12 card-body m-auto">
            <img src="{{Storage::url('public/LOGO.png')}}" style="width: 80%; border-radius: 50%; "
                class="mt-4 shadows spin">
        </div>
    </div>
    <div id="about" class="content bg-dark shadows" style="min-height:82vh ">
        <div class="col col-md-12 text-center card-body" style="color: #ffc107;">
            <div>
                <h4 data-aos="flip-right"> - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
                    - - </h4>
                <h1 class="bold display-2" data-aos="fade-up" data-aos-duration="1500" style="font-weight: 600">About
                    Me
                </h1>
            </div>
            <div style="display: flex">
                <div class="col col-md-12 card-body" style="width: 50%" data-aos="fade-right" data-aos-duration="1500" data-aos-delay="200">
                    <img src="{{Storage::url('public/me.jpg')}}" style="width: 70%; border-radius: 50%;"
                        class="mt-4 shadows spin">
                </div>
                <div class="col col-md-12 card-body" style="color: #fff;width: 50%; margin: auto 4rem !important;">
                    <p class="lead text-warning" style="width: 80%; margin: 40px auto; text-align: right;"
                        data-aos="fade-left" data-aos-duration="1500" data-aos-delay="300">Lorem ipsum dolor sit amet,
                        consectetur adipiscing
                        elit.
                        Phasellus rhoncus
                        felis quis arcu tempus sagittis. Etiam odio quam, ultrices sit amet faucibus a, rhoncus eu
                        turpis.
                        Integer
                        aliquet, diam id pellentesque ultrices, dolor arcu faucibus sem, at fermentum sapien augue et
                        orci.
                        Phasellus suscipit libero non est aliquet bibendum. Morbi consequat suscipit dapibus. Sed eu
                        egestas
                        sapien,
                        ut accumsan lacus. </p>
                </div>
            </div>
        </div>
    </div>