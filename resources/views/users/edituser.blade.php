@extends('admin.layout.app')

@section('body')
<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="card">
                <div class="card-header d-flex row">
                    <h4 class="col-10">Edit Categories</h4>
                    <a href="{{url('users')}}" class="btn btn-danger col-2">Back</a>
                </div>
                    <div class="card-body">
                       <form action="{{ route('users.update' , $user->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="{{$user->name}}"/>
                            @error('name') <span class="text-danger">{{$message}}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label>Password</label>
                            <input type="text" name="password" class="form-control" value="{{$user->password}}"/>
                            @error('password') <span class="text-danger">{{$message}}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label>Email</label>
                            <textarea name="email" rows="3" class="form-control" >{!! $user->email !!}</textarea>
                            @error('email')<span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label>City</label>
                            <input type="text" name="city" class="form-control" value="{{$user->city}}"/>
                            @error('city') <span class="text-danger">{{$message}}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label>Address</label>
                            <input type="text" name="address" class="form-control" value="{{$user->address}}"/>
                            @error('address') <span class="text-danger">{{$message}}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label>Mobile</label>
                            <input type="number" name="mobile" class="form-control" value="{{$user->mobile}}"/>
                            @error('mobile') <span class="text-danger">{{$message}}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label>Age</label>
                            <input type="number" name="age" class="form-control" value="{{$user->age}}"/>
                            @error('age') <span class="text-danger">{{$message}}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label>Admin</label>
                            <input type="checkbox" name="status" {{$user->status == 1? 'checked':''}}/>
                            @error('status')<span class="text-danger">{{$message}}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <button class="btn btn-primary" type="submit">Update</button>
                        </div>
                       </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection