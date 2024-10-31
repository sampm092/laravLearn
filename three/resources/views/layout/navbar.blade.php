<header class="p-3 bg-light text-white shadow rounded">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="{{route('welcome')}}" class="navbar-brand fw-light">{{ config('app.name') }}</a></li>
            <li><a href="{{route('bookView')}}" class="nav-link px-2 text-secondary">Home</a></li>
                <li><a href="#" class="nav-link px-2 text-secondary">About</a></li>
            </ul>

            <form action="{{ route('profile') }}" class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" method="GET">
                <input name="search" type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
            </form>

            <div class="text-end">
                <form action="{{route('logout')}}" method="POST">
                    @csrf
                <button type="submit" class="btn btn-outline-danger btn-light me-2" >Logout</button>
                </form>
            </div>
        </div>
    </div>
</header>