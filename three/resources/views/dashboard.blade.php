@extends('layout.html')

<body style="background-color:#FFFFFF;">
    <style>
        @import "https://use.fontawesome.com/releases/v5.5.0/css/all.css";

        * {
            margin: 0;
            padding: 0;
            font-family: sans-serif;
        }

        .logo img {
            float: left;
            width: 180px;
            height: auto;
        }


        .title {
            position: absolute;
            top: 40%;
            left: 30%;
            transform: translate(-50%; -50%);
        }

        .title h1 {
            font-family: sans-serif;
            color: #fff;
            font-size: 80px;

        }

        .button {
            position: absolute;
            top: 55%;
            left: 35%;
            transform: translate(-50%; -50%);
        }
    </style>
    <header id="header" class="p-3 text-white shadows" style="background-color: #130c0b;">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="{{ redirect('dashboard')}}"
                            class="navbar-brand fw-light text-warning">{{ config('app.name') }}</a></li>
                    <li><a href="#header" class="nav-link px-2 text-warning">Home</a></li>
                    <li><a href="#" class="nav-link px-2 text-warning">About</a></li>
                </ul>
                <div class="text-end ms-auto" style="margin-left: auto">
                    <a id="hover2" type="button" href="#"
                        class="btn btn-outline-warning btn-dark me-2">Logout</a>
                </div>
            </div>
        </div>
    </header>

    <div class="row" style="margin-left: 50px;">
        @foreach ($books as $book)
            <div>
                <div class="card"
                    style="width: 250px; height: 325px; background-color:#EFB509; margin : 30px 15px;border-style: solid;border-width: 5px;border-color: black;margin-right-auto">
                    <a href="{{ route('detailed') }}">
                        <img src="{{ Storage::url('public/books/' . $book->cover) }}"  style="width: -webkit-fill-available; height:315px" alt="">
                        <div class="judul_art">
                            <p style="position: absolute;left: 1px; bottom: -15px; color: white; font-size: 20px;}">
                                <b>{{ $book->title }}</b>
                            <p>
                        </div>
                        </img>
                    </a>


                </div>
            </div>



        @endforeach