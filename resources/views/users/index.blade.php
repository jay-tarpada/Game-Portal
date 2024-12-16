@extends('admin.layout.app')

@section('body')
<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">

                @if(session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="card">
                    <div class="card-header d-flex row">
                        <h4 class="col-10">User List</h4>
                        <a href="{{ route('users.create') }}" class="btn btn-primary col-2">Add User</a>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered ">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        {{-- <th>Password</th> --}}
                                        <th>Email</th>
                                        <th>City</th>
                                        <th>Mobile</th>
                                        <th>Age</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($all as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        {{-- <td>{{ $user->password }}</td> --}}
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->city }}</td>
                                        <td>{{ $user->mobile }}</td>
                                        <td>{{ $user->age }}</td>
                                        <td>{{ $user->status == 1 ? 'Admin' : 'User' }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-success" style="margin-right: 8px;">Edit</a>
                                                <a href="{{ route('users.show', $user->id) }}" class="btn btn-info" style="margin-right: 8px;">Show</a>
                                        
                                                <form action="{{ route('users.destroy', $user->id) }}" method="post" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                        
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $all->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
