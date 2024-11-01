<!-- DASHBOARD->PROFILE
BOOK LIST -->
<!-- extends menggunakan layout\header  -->
@extends('layout.header')

@section('content')
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

@include('layout.notif')
<div class="row">
    <div class="col-md-12 mb-4" style="min-height:80vh">
        <div class="card-body">
            <a href="{{ route('create') }}" class="btn btn-md mb-3" style="color: #fff;    background-color: #343a40 !important; ">ADD
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
                                    style="height: 150px; max-width: 185px">
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
</div>
@endsection