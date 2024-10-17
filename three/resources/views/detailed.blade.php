<!-- DASHBOARD->PROFILE
BOOK LIST -->
<!-- extends menggunakan layout\header  -->
@extends('layout.html')

@section('content')
<body class="bg-light m-4">
<h1>{{ $books->title }}</h1>
<p>{{ $books->desc}}</p>


@endsection