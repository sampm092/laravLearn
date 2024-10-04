<!-- DASHBOARD->PROFILE
BOOK LIST -->
<!-- extends menggunakan layout\header  -->
@extends('layout.header')

        @section('content')
            <div class="row">
                <div class="col-md-12">
                <div class="card-body bg-light">
                        <a href="#" class="btn btn-md btn-success mb-3" style="background: cadetblue">ADD BOOK</a>
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
                                    @foreach ($books as $book)
                                    <tr>
                                        <td class="text-center">
                                            <img src="" class="rounded" style="width: 150px">
                                        </td>
                                        <td>{{ $book->title }}</td>
                                        <td>{{ $book->author }}</td>
                                        <td>{{ $book->created_at }}</td>
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="" method="POST">
                                                <a href="#" class="btn btn-sm btn-success">VIEW</a>  
                                                <a href="#" class="btn btn-sm btn-primary">EDIT</a>

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
