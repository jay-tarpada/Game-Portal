@extends('layout.app')

<head>
    <style>
        .game-cards {
            display: flex;
            flex-wrap: wrap; /* Enable wrapping */
            gap: 20px; /* Space between cards */
        }

        .game-card {
            width: calc(33.33% - 20px); /* Three cards per row, adjust as needed */
            border: 1px solid #ccc;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .game-card img {
            width: 100%;
            height: auto;
            border-radius: 5px;
        }

        .buttons {
            margin-top: 10px;
        }

        .play-button,
        .download-button {
            display: inline-block;
            margin: 5px;
            padding: 10px 15px;
            text-decoration: none;
            color: white;
            border-radius: 5px;
        }

        .play-button {
            background-color: #007bff; /* Blue */
        }

        .download-button {
            background-color: #28a745; /* Green */
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .game-card {
                width: calc(50% - 20px); /* Two cards per row on medium screens */
            }
        }

        @media (max-width: 480px) {
            .game-card {
                width: 100%; /* One card per row on small screens */
            }
        }



    </style>
</head>

@section('body1')
<div id="preloder">
    <div class="loader"></div>
</div>
<div class="container">
    @if(auth()->check())
        <h2 style="color: #ccc">Welcome, {{ Auth::user()->name }} !</h2>
        <p style="color: #28a745">You are successfully logged in.</p>
        
        <!-- Logout Form -->
        {{-- <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form> --}}
    @else
        <p style="color: rgb(156, 156, 156)">You are not logged in. Please <a style="color:green" href="{{ route('login') }}">login</a>.</p>
    @endif
</div>

<!-- Hero Section Begin -->
<section class="hero">
    <div class="container">
        <div class="hero__slider owl-carousel">
            @foreach ($games as $game)
            <div class="hero__items set-bg" data-setbg="{{ asset('storage/' . $game->image) }}">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="hero__text">
                            <div class="label">Game</div>
                            <h2>{{ $game->name }}</h2>
                            <p>{{ $game->description }}</p>
                            <a  href="{{ route('games.play', $game->id) }}"><span>Play Now</span> <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Hero Section End -->

<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            {{-- <div class="col-lg-8"> --}}
                <div class="trending__product">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-8">
                            <div class="section-title">
                                <h4>All Games</h4>
                            </div>
                        </div>
                    </div>
                    <div class="game-cards" > <!-- Updated to include the container for game cards -->
                        @foreach ($games as $game)
                            <div class="game-card">
                                <img style="border-radius: 10px" src="{{ asset('storage/' . $game->image) }}" alt="{{ $game->name }}">
                                <h2 style="color: white">{{ $game->name }}</h2>
                                <p style="color: rgb(164, 162, 162)">{{ $game->description }}</p>
                                <div class="buttons">
                                    <a href="{{ route('games.play', $game->id) }}" class="play-button">Play</a>
                                    <a href="{{ asset('storage/' . $game->html_file) }}" download class="download-button">Download</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
