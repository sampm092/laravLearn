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

    .none {
        display: none !important;
    }

    .our-form-control:disabled {
        background-color: transparent !important;
        color: black;
    }

    .our-form-control {
        /* display: block;
        width: 100%;
        height: calc(1.5em + .75rem + 2px);
        padding: .375rem .75rem; */
        /* font-size: 1rem;
        font-weight: 400; */
        /* line-height: 1.5; */
        color: black;
        background-color: transparent;
        /* background-clip: padding-box; */
        border: 0px solid #130c0b;
        /*border-radius: .25rem;
        transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out; */
    }

    .edit-pict {
        opacity: 0;
        max-width: -webkit-fill-available;
        width: 200px;
        height: 200px;
        border: 1px solid black;
        z-index: 10000;
        position: absolute;
        border-radius: inherit;
    }
</style>
<!-- extends menggunakan layout\header  -->
@extends('layout.header')
@section('content')
@include('layout.notif')

<div style="display:flex; min-height: 85vh;">
    <!-- SIDEBAR -->
    <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark"
        style="width: 30vh;border-top: 1px solid #ffc107">
        <ul class="nav nav-pills flex-column mb-auto  mt-5">
            <li class="nav-item">
                <a href="#" onclick="toBooks()" class="nav-link active text-white" aria-current="page">
                    <!-- <svg class="bi me-2" width="16" height="16">
                        <use xlink:href="#home"></use>
                    </svg> -->
                    Books
                </a>
            </li>
            <li>
                <a href="#" onclick="toProfile()" class="nav-link text-white">
                    <!-- <svg class="bi me-2" width="16" height="16">
                        <use xlink:href="#speedometer2"></use>
                    </svg> -->
                    Account
                </a>
            </li>
        </ul>
    </div>



    <!-- BOOK SECTION -->
    <div id="book-sect" class="container mt-3" style="padding: inherit;border-radius: 5px;display:flex;">
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
    </div>

    <div id="profile-sect" class="none ml-5">
        <!-- <div>Edit Profile : edit name, picture, and delete account</div> -->
        <!-- Perta,a buat username input tapi inactive dulu, kalo klik tombol edit jadi active jadi bisa edit username
            buat gambar besar dan bikin ubah gambar profil, terus buat button merah untuk delete akun pake alert(kalo bisa 2 kyk github) -->
        <div id="form">
            <form action="{{route('updateProfile', $user->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-outline m-5 d-flex" data-mdb-input-init>
                    <div class="" xlink:href="" style="border-radius: 100px;width: 200px;height: 200px;">
                        <input type="file" accept=".png, .jpg, .jpeg" class="btn edit-pict" name="picture"
                            onchange="displayImage(event)" />
                        <img id="uploadedImage" src="{{ Storage::url('public/profile/' . Auth::user()->picture) }}"
                            alt="" class="img-fluid" style="border-radius: 100px;width: 100%;height: 100%;">
                    </div>
                    <div class="m-auto d-flex">
                        <h1>
                            <a onclick="enableInput()" class="ml-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path
                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                    <path fill-rule="evenodd"
                                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                </svg>
                            </a>
                            <input id="username" type="text" name="username"
                                class="our-form-control form-border inactive ml-2"
                                value="{{ old('username', $user->username) }}" placeholder="Ubah username" disabled />
                        </h1>
                    </div>
                </div>

                <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
                <button type="reset" class="btn btn-md btn-warning">RESET</button>
            </form>
        </div>
        <div>
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
        </div>
        <!-- <div id="preview">
            <img id="uploadedImage" style="border-radius: 100px;width: 200px;height: 200px;"
                alt="Uploaded Image Preview">
        </div> -->
    </div>
</div>
</div>
</div>
@endsection

<script>
    const nav_link = document.getElementsByClassName("nav-link");

    function toProfile() {
        var profile = document.getElementById("profile-sect");
        var books = document.getElementById("book-sect");

        books.classList.add("none");
        nav_link[2].classList.remove("active");
        profile.classList.remove("none");
        nav_link[3].classList.add("active");
    }

    function toBooks() {
        var profile = document.getElementById("profile-sect");
        var books = document.getElementById("book-sect");

        books.classList.remove("none");
        profile.classList.add("none");
        nav_link[3].classList.remove("active");
        nav_link[2].classList.add("active");
    }

    function enableInput() {
        document.getElementById("username").disabled = false; //menghilangkan disabled dari elemen
        document.getElementById("username").focus(); //membuat langsung ada cursor edit
    }

    function displayImage(event) {
        const file = event.target.files[0];
        if (file && file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = function (e) {
                const img = document.getElementById('uploadedImage');
                img.src = e.target.result;
                img.style.display = 'block';
            };
            reader.readAsDataURL(file);
        } else {
            alert("Please upload a valid image file.");
        }
    }

</script>