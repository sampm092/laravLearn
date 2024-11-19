<!-- DASHBOARD->PROFILE
BOOK LIST -->
<!-- extends menggunakan layout\header  -->
@extends('layout.html')
@section('cotitle')
{{$books->title}}
@endsection

@section('content')

<body style="background-color:#d9d9d9">
    <style>
        .sub {
            width: 280px;
            height: auto;
            background-color: #204f20
        }

        hr {
            height: 2px;
            background-color: black;
            border-color: black;
        }

        .underline:hover {
            text-decoration: underline;
        }

        .main {
            min-height: 100vh;
            display: flex;

        }

        @media screen and (max-width: 1074px) {
            .main {
                display: flex;
                flex-direction: column;
            }

            .sub {
                width: 100% !important;
            }
        }
    </style>
    <div class="main">
        <div class="sub d-flex flex-column flex-shrink-0 p-3 text-white">
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


    </div>

    @endsection