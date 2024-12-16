@extends('admin.layout.app')

@section('body')
<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="card">
                    <div class="card-header d-flex row">
                        <h4 class="col-10">Create Categories</h4>
                            <a href="{{url('users')}}" class="btn btn-danger col-2">Back</a>
                    </div>
                    <div class="card-body">

                       <form action="{{url('users')}}" method="post">
                        @csrf
                        
                        <div class="mb-3">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control"/>
                            @error('name') <span class="text-danger">{{$message}}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control"/>
                            @error('password') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control"/>
                            @error('email') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                       
                        <div class="mb-3">
                            <label>City</label>
                            <input type="text" name="city" class="form-control"/>
                            @error('city') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label>Address</label>
                            <textarea name="address" rows="3" class="form-control"></textarea>
                            @error('address')<span class="text-danger">{{$message}}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label>Mobile</label>
                            <input type="number" name="mobile" class="form-control"/>
                            @error('mobile') <span class="text-danger">{{$message}}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label>Age</label>
                            <input type="number" name="age" class="form-control"/>
                            @error('mobile') <span class="text-danger">{{$message}}</span> @enderror
                        </div>


                        <div class="mb-3">
                            <label>Admin</label>
                            <input type="checkbox" name="status"/>
                            @error('status')<span class="text-danger">{{$message}}</span> @enderror
                        </div>

                    

                        <div class="mb-3">
                            <button class="btn btn-primary" type="submit">Save</button>
                        </div>
                       </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection