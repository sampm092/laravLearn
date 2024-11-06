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

    .nav-link.active {
        background-color: #cb9904 !important;
    }
</style>
<!-- extends menggunakan layout\header  -->
@extends('layout.header')
@section('content')

<div style="display:flex">
    <!-- SIDEBAR -->
    <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: fit-content;">
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="#book-sect" class="nav-link active" aria-current="page">
                    <svg class="bi me-2" width="16" height="16">
                        <use xlink:href="#home"></use>
                    </svg>
                    Books
                </a>
            </li>
            <li>
                <a href="#profile-sect" class="nav-link text-white">
                    <svg class="bi me-2" width="16" height="16">
                        <use xlink:href="#speedometer2"></use>
                    </svg>
                    Account
                </a>
            </li>
        </ul>
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
                                    <a href=" {{ route('detailed', $book->id) }}" class="btn btn-sm btn-success">VIEW</a>
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
        <div>Edit Profile : edit name, picture, and delete account</div>  
        <!-- Perta,a buat username input tapi inactive dulu, kalo klik tombol edit jadi active jadi bisa edit username
            buat gambar besar dan bikin ubah gambar profil, terus buat button merah untuk delete akun pake alert(kalo bisa 2 kyk github) -->
    </div>
</div>
</div>
</div>
@endsection