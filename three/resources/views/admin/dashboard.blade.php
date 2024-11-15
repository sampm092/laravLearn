@extends('layout.html')
<style>
    .back {
        position: fixed;
        top: 10px;
        left: 5px;
    }
</style>

<h1 class="text-center mt-5">WELCOME TO ADMIN DASHBOARD</h1>
<a href="{{ route('bookView') }}" class="btn back">
    < <span class="underline">Back</span>
</a>

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
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->password }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>
                    @if ( $user->is_admin === 1)
                        Admin
                    @endif
                    @if ( $user->is_admin === 0)
                    User
                    @endif
                    </td>
                    <td class="text-center">
                        <form action="{{ route('destroyUser', $user->id) }}" method="POST" onsubmit="confirmDelete(event)">
                            <a href="{{ route('admin.detail', $user->id) }}" class="btn btn-sm btn-success">VIEW</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{$users->links()}}
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