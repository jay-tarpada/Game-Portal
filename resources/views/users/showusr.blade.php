@extends('admin.layout.app')

@section('body')
<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="card">
                <div class="card-header d-flex row">
                    <h4 class="col-10">User Details</h4>
                    <a href="{{url('users')}}" class="btn btn-danger col-2">Back</a>
                </div>
                    <div class="card-body">
                       
                        <div class="mb-3">
                            <label>Name</label>
                            <p>{{$user->name}} </p>
                        </div>

                        <div class="mb-3">
                            <label>Password</label>
                            <p>{!! $user->password !!}</p>
                        </div>

                        <div class="mb-3">
                            <label>Email</label>
                            <p>{{$user->email}} </p>
                        </div>

                        <div class="mb-3">
                            <label>City</label>
                            <p>{{$user->city}} </p>
                        </div>

                        <div class="mb-3">
                            <label>Address</label>
                            <p>{{$user->address}} </p>
                        </div>

                        <div class="mb-3">
                            <label>Mobile</label>
                            <p>{{$user->mobile}} </p>
                        </div>

                        <div class="mb-3">
                            <label>Age</label>
                            <p>{{$user->age}} </p>
                        </div>

                        <div class="mb-3">
                            <label>Status</label>
                            <p>{{$user->status == 1? 'Admin':'User'}}</p>
                        </div>
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection