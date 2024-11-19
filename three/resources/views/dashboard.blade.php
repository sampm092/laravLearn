@extends('layout.html')
@section('cotitle')
{{$user->username}}
@endsection

<body style="background-color:#d9d9d9;">
    <style>
        @import "https://use.fontawesome.com/releases/v5.5.0/css/all.css";

        * {
            margin: 0;
            padding: 0;
            font-family: sans-serif;
        }

        .border-curved {
            border-radius: 20px;
        }

        .card {
            width: 250px;
            height: 325px;
            margin: 30px 15px;
        }

        .book-cover {
            width: -webkit-fill-available;
            height: -webkit-fill-available;
            object-fit: fill;
            border-radius: 20px;
        }

        .alt-btn {
            display: inline-block;
            font-weight: 400;
            text-align: center;
            vertical-align: middle;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            background-color: transparent;
            border: 1px solid transparent;
            padding: 0;
            font-size: 1rem;
            margin-left: 15px;
            line-height: 1.5;
            border-radius: .25rem;
            transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        }

        .alt-card {
            position: relative;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-direction: column;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
        }

        .mleft-auto {
            margin-left: auto !important;
        }

        @media only screen and (max-width: 992px) {
            .mleft-auto {
                margin-left: 0 !important;
                margin-top: 10px;
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
                    @if (Auth::user()->is_admin)
                        <li><a href="{{route('admin.dashboard')}}" class="nav-link px-2 text-warning">Admin</a></li>
                    @endif
                </ul>
                <div class="text-end ms-auto mleft-auto">
                    <a type="button" href="{{route('profile')}}" class="alt-btn btn-outline-warning btn-dark mr-2">
                        <img src="{{Storage::url('public/profile/' . Auth::user()->picture)}}" alt=""
                            style="width: 35px;height:35px;padding:0;border-radius: 3px;">
                    </a>
                    <a type="button" href="{{route('profile')}}" class="our-orange">
                        {{Auth::user()->username}}
                    </a>
                    <!-- <a id="hover2" type="button" href="#" class="btn btn-outline-warning btn-dark me-2">Logout</a> -->
                </div>
            </div>
        </div>
    </header>
    <div style="margin: 40px;">
        <h1 class="ml-4 mb-3">Welcome, <b class="our-orange">{{Auth::user()->username}}</b></h1>
        <form action="{{ route('bookView') }}" class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" method="GET">
            <input name="search" type="search" class="form-control form-control-dark" placeholder="Search..."
                aria-label="Search">
        </form>
    </div>

    <div class="row justify-content-left" style="margin: 40px;min-height: 65vh">
        @foreach($books as $book)
            <div>
                <div class="alt-card " style="background-color:transparent; margin: 30px">
                    <a class="border-curved shadow" href="{{ route('detailed', $book->id) }}">
                        <div class="border-curved" style="width:250px; height: 325px;}">
                            <img class="book-cover" src="{{ Storage::url('public/books/' . $book->cover) }}" alt="">
                            <div class="judul_art">
                                <p
                                    style="position: absolute; bottom: -15px; color: white; font-size: 18px;margin:18px 12px">
                                    <b>{{ $book->title }}</b>
                                <p>
                            </div>
                            </img>
                        </div>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
    {{ $books->links()}}