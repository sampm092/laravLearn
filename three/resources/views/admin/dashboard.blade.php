@extends('layout.html')
@section('cotitle')
Admin Page
@endsection
<style>
    *{
        word-wrap: break-word; 
    }
    .back {
        position: absolute;
        top: 10px;
        left: 5px;

    }

    @media screen and (max-width: 1157px) {
        .d-flex {
            flex-direction: column;
        }


        footer {
            z-index: 0 !important;
        }

        th,
        td {
            display: block;
            width: 100%;
            box-sizing: border-box;
        }

    }
</style>

<div class="container d-flex" style="flex-direction: column">
    <h1 class="text-center mt-5">WELCOME TO ADMIN DASHBOARD</h1>
    <a href="{{ route('bookView') }}" class="btn back">
        < <span class="underline">Back</span>
    </a>
    <div class="col-md-12">
        <div class="card-body" style="min-height: 95vh">
            <table class="table table-bordered table-striped table-hover">
                <thead class="thead-dark text-center">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Password</th>
                        <th scope="col">Date Added</th>
                        <th scope="col">Role</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->username }}
                                @if ($user->id == Auth::user()->id)
                                    <b> (You)</b>
                                @endif
                            </td>
                            <td>{{ $user->email }}</td>
                            <td style="max-width: 300px">{{ $user->password }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td>
                                @if ($user->is_admin === 1)
                                    Admin
                                @endif
                                @if ($user->is_admin === 0)
                                    User
                                @endif
                            </td>
                            <td class="text-center">
                                <form action="{{ route('destroyUser', $user->id) }}" method="POST"
                                    onsubmit="confirmDelete(event)">
                                    <a href="{{ route('admin.detail', $user->id) }}" class="btn btn-sm btn-success">VIEW</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">DELETE</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{$users->links()}}
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function confirmDelete(event) {
        event.preventDefault(); // Prevent form submission
        Swal.fire({
            title: 'Are you sure to delete this account?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                event.target.closest('form').submit(); // Submit the form if confirmed
            }
        });
    }
</script>