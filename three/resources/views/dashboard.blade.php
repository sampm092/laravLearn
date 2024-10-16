@extends('layout.html')

<body style="background-color:#FFFFFF;">
    <style>
        @import "https://use.fontawesome.com/releases/v5.5.0/css/all.css";

        * {
            margin: 0;
            padding: 0;
            font-family: sans-serif;
        }

        header {
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(background.PNG);
            height: 100vh;
            background-size: cover;
            background-position: center;
        }

        ul {
            float: right;
            list-style-type: none;
            margin-top: 25px;
        }

        ul li {
            display: inline-block;
        }

        ul li a {
            text-decoration: none;
            color: #fff;
            padding: 5px 20px;
            border: 1px solid;
            transition: 0.6s;
            margin: 10px;

        }

        ul li a:hover {
            background-color: #fff;
            color: #000;
        }

        ul li.active a {
            background-color: #fff;
            color: #000;
        }

        .logo img {
            float: left;
            width: 180px;
            height: auto;
        }

        .main {
            max-width: 1200px;
            margin: auto;
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

        .btn1 {
            border: 1px solid #fff;
            padding: 10px 30px;
            color: #fff;
            text-decoration: none;
            transition: 0.6s ease;
            border-radius: 5px;
            margin: 10px;
        }

        .btn1:hover {
            background-color: #fff;
            color: #000
        }

        .btn2 {
            border: 1px solid #fff;
            padding: 10px 50px;
            color: #fff;
            text-decoration: none;
            transition: 0.6s ease;
            border-radius: 5px;
        }

        .btn2:hover {
            background-color: #fff;
            color: #000;

        }
    </style>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #FFFFFF;">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03"
            aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="index.html"><i class="fas fa-home"></i> Home <span
                            class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item" style="width:160px;">
                    <a class="nav-link" href="actions.php" style="width:160px;"><i class="fas fa-book"></i> Daftar
                        Kategori</a>
                </li>
                </form>
            </ul>

        </div>
    </nav>
    <div>
        <center>
            <h1> Mediums </h1>
        </center>
    </div>
    <div class="row" style="margin-left: 50px;">
        @foreach ($books as $book)

            <div>
                <div class="card"
                    style="width: 350px; height: 425px; background-color:#EFB509; margin : 30px 30px 30px -26px;border-style: solid;border-width: 5px;border-color: black;">
                    <a href="{{ route('view') }}">
                        <img src="{{ Storage::url('public/books/' . $book->cover) }}" width="342px" height="415px" alt="">
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