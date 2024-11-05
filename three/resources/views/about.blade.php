@extends('layout.html')

<style>
    .about1 {
        display: flex
    }

    .about-right {
        width: 80%;
        margin: 40px auto;
        text-align: right;
    }


    .mleft-auto {
        margin-left: auto !important;
    }

    @media only screen and (max-width: 992px) {
        .mleft-auto {
            margin-left: 0 !important;
            margin-top: 10px;
        }
        .about-right{
                text-align: center !important;
            }

        .about1 {
            justify-items: center;
            display: block !important;
        }
    }
</style>
<header id="header" class="p-3 text-white shadows bg-dark">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="{{route('welcome')}}"
                        class="navbar-brand fw-light text-warning">{{ config('app.name') }}</a></li>
                <li><a href="{{route('bookView')}}" class="nav-link px-2 text-warning">Home</a></li>
                <li><a href="{{route('about')}}" class="nav-link px-2 text-warning">About</a></li>
            </ul>
            <div class="text-end ms-auto mleft-auto">
                <a type="button" href="{{route('profile')}}" class="alt-btn btn-outline-warning btn-dark mr-2">
                    <img src="{{Storage::url('public/profile/' . Auth::user()->picture)}}" alt=""
                        style="width: 35px;height:35px;padding:0">
                </a>
                <a type="button" href="{{route('profile')}}" class="our-orange">
                    {{Auth::user()->username}}
                </a>
                <!-- <a id="hover2" type="button" href="#" class="btn btn-outline-warning btn-dark me-2">Logout</a> -->
            </div>
        </div>
    </div>
</header>
<div id="about" class="content bg-dark shadows" style="min-height:82vh ">
    <div class="col col-md-12 text-center card-body" style="color: #ffc107;">
        <div>
            <h4 data-aos="flip-right"> - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
                - - </h4>
            <h1 class="bold display-2" data-aos="fade-up" data-aos-duration="1500" style="font-weight: 600">About
                Me
            </h1>
        </div>
        <div class="about1">
            <div class="col col-md-12 card-body" style="width: 50%" data-aos="fade-right" data-aos-duration="1500">
                <img src="{{Storage::url('public/me.jpg')}}" style="width: 70%; border-radius: 50%;"
                    class="mt-4 shadows spin">
            </div>
            <div class="col col-md-12 card-body" style="color: #fff;width: 50%; margin: auto 4rem !important;">
                <p class="lead text-warning about-right" data-aos="fade-left" data-aos-duration="1500">Lorem ipsum dolor
                    sit
                    amet,
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