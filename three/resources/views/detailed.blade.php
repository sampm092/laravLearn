<!-- DASHBOARD->PROFILE
BOOK LIST -->
<!-- extends menggunakan layout\header  -->
@extends('layout.html')

@section('content')

<body style="background-color:#d9d9d9">
    <style>
        hr {
            height: 2px;
            background-color: black;
            border-color: black;
        }

        .underline:hover {
            text-decoration: underline;
        }
    </style>
    <main style="height:100vh; display:flex">
        <div class="d-flex flex-column flex-shrink-0 p-3 text-white"
            style="width: 280px; height: -webkit-fill-available;background-color: #204f20">
            <div class="justify-content-center" style="margin: 40px auto">
                <div class="fs-4" style="text-align:center"><img class="book-cover shadow"
                        src="{{ Storage::url('public/books/' . $books->cover) }}" alt="" style="width:150px; "></div>
                <ul class="nav nav-pills flex-column mb-auto">
                    <li class="nav-item mt-5">
                        <b>{{ $books->title }}</b>
                        <hr>
                    </li>
                    <li class="nav-item">
                        by {{ $books->author }}
                        <hr>
                    </li>
                    <li class="nav-item">
                        <i>{{ $books->updated_at}}</i>
                        <hr>
                    </li>
                </ul>
            </div>

        </div>
        <div style="margin: 18px 55px">
            <a href="{{ url()->previous() }}" class="btn">
                < <span class="underline">Back</span>
            </a>
            <div>
                <h3>Description :</h3>
            </div>
            <div>
                <p>{{ $books->desc}}</p>
            </div>
        </div>

    </main>


    @endsection