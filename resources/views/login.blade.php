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
                    <h2>Login</h2>
                    <p>Welcome to the Game Portal</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="login spad ">
   
<div class="container">
    <h2 style="color: wheat" >Login</h2><br>
    
    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    

    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="email">Email Address</label>
            <input type="email" name="email" class="form-control" id="email" required>
        </div>

        <div class="mb-3">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" id="password" required>
        </div>

        <button type="submit" class="btn btn-danger">Login</button>
    </form>
    
    <p class="mt-2" style="color: gray">Don't have an account? <a style="color:yellow" href="{{ route('signup') }}">Sign up here</a></p>
</div>


</section>
@endsection