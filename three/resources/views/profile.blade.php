<!-- DASHBOARD->PROFILE
BOOK LIST -->
<!-- extends menggunakan layout\header  -->
@extends('layout.header')

@section('content')
<style>
    svg {
        width: 2rem;
    }
</style>

@include('layout.notif')
<div class="row">
    <div class="col-md-12 mb-4">
        <div class="card-body bg-light">
            <a href="{{ route('create') }}" class="btn btn-md btn-success mb-3" style="background: cadetblue">ADD
                BOOK</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Book Cover</th>
                        <th scope="col">Book Title</th>
                        <th scope="col">Author</th>
                        <th scope="col">Date Added</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user->books as $book)
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
        </div>
    </div>
</div>
@endsection
