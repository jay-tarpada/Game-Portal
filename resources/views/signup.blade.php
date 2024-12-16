@extends('layout.app')
<head>
    <style>
        label{
            color: white;
        }
        .mb-3{
        width: 50%;
       }
    </style>
</head>
@section('body1')


<section class="normal-breadcrumb set-bg" data-setbg="img/normal-breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="normal__breadcrumb__text">
                    <h2>Sign Up</h2>
                    <p>Welcome to the Game Portal</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Normal Breadcrumb End -->

<!-- Signup Section Begin -->
<section class="signup spad">

    <div class="container">
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

        <h2 style="color: wheat">Signup</h2><br>
        <form action="{{route('signup.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name">Name:</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="email">Email:</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="password">Password:</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="password_confirmation">Confirm Password:</label>
                <input type="password" name="password_confirmation" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="city">City:</label>
                <input type="text" name="city" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="address">Address:</label>
                <input type="text" name="address" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="mobile">Mobile:</label>
                <input type="text" name="mobile" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="age">Age:</label>
                <input type="number" name="age" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-danger">Sign Up</button>
        </form>
    </div>
    
    
</section>

@endsection