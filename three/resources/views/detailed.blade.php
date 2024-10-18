<!-- DASHBOARD->PROFILE
BOOK LIST -->
<!-- extends menggunakan layout\header  -->
@extends('layout.html')

@section('content')

<body class="bg-light m-4 justify-content-center">
    <div>
        <h1>{{ $books->title }}</h1>
    </div>
    <div>
        <p>{{ $books->desc}}</p>
    </div>

    @endsection