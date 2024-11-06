<!-- DASHBOARD->PROFILE
BOOK LIST -->
<style>
    svg {
        width: 2rem;
    }

    body {
        background-color: #d9d9d9;
    }

    table {
        border: 1px solid black !important;
    }
</style>
<!-- extends menggunakan layout\header  -->
@extends('layout.header')
@section('content')

<div style="display:flex">
    <!-- SIDEBAR -->
    <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: fit-content;">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <svg class="bi me-2" width="40" height="32">
                <use xlink:href="#bootstrap"></use>
            </svg>
            <span class="fs-4">Sidebar</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="#" class="nav-link active" aria-current="page">
                    <svg class="bi me-2" width="16" height="16">
                        <use xlink:href="#home"></use>
                    </svg>
                    Home
                </a>
            </li>
            <li>
                <a href="#" class="nav-link text-white">
                    <svg class="bi me-2" width="16" height="16">
                        <use xlink:href="#speedometer2"></use>
                    </svg>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="#" class="nav-link text-white">
                    <svg class="bi me-2" width="16" height="16">
                        <use xlink:href="#table"></use>
                    </svg>
                    Orders
                </a>
            </li>
            <li>
                <a href="#" class="nav-link text-white">
                    <svg class="bi me-2" width="16" height="16">
                        <use xlink:href="#grid"></use>
                    </svg>
                    Products
                </a>
            </li>
            <li>
                <a href="#" class="nav-link text-white">
                    <svg class="bi me-2" width="16" height="16">
                        <use xlink:href="#people-circle"></use>
                    </svg>
                    Customers
                </a>
            </li>
        </ul>
        <hr>
        <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                <strong>mdo</strong>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                <li><a class="dropdown-item" href="#">New project...</a></li>
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="#">Sign out</a></li>
            </ul>
        </div>
    </div>

    <!-- BOOK SECTION -->
    <div id="book-sect" class="container mt-3" style="padding: inherit;border-radius: 5px;display:flex;">
        @include('layout.notif')
        <div class="col-md-12 mb-4" style="min-height:80vh">
            <div class="card-body">
                <a href="{{ route('create') }}" class="btn btn-md mb-3"
                    style="color: #fff;    background-color: #343a40 !important; ">ADD
                    BOOK</a>
                <table class="table table-bordered table-striped table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Book Cover</th>
                            <th scope="col">Book Title</th>
                            <th scope="col">Author</th>
                            <th scope="col">Date Added</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($books as $book)
                            <tr>
                                <td class="text-center">
                                    <img src=" {{ Storage::url('public/books/' . $book->cover) }} " class="rounded"
                                        style="height: 150px; max-width: 185px;">
                                </td>
                                <td style="max-width:200px">{{ $book->title }}</td>
                                <td>{{ $book->author }}</td>
                                <td>{{ $book->created_at }}</td>
                                <td class="text-center">
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                        action="{{ route('delete', $book->id) }}" method="POST">
                                        <a href=" {{ route('detailed', $book->id) }}"
                                            class="btn btn-sm btn-success">VIEW</a>
                                        <a href=" {{ route('edit', $book->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$books->links()}}
            </div>
        </div>

        <div id="profile-Sect" class="row">

        </div>
    </div>
</div>
@endsection