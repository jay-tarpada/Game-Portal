@extends('admin.layout.app')

@section('body')
<head>
    <style>
           .game-cards {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
}

.game-card {
    width: 300px;
    border: 1px solid #ccc;
    padding: 15px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
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

.play-button{
    display: inline-block;
    margin: 5px;
    padding: 10px 15px;
    text-decoration: none;
    color: white;
    background-color: #007bff;
    border-radius: 5px;
}
    </style>
</head>
<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="card">
                <div class="card-header d-flex row">
                    <h4 class="col-10">Game Details</h4>
                    <a href="{{url('games')}}" class="btn btn-danger col-2">Back</a>
                </div>
                <div class="game-cards">
                   
                    <div class="game-card">
                        <img src="{{ asset('storage/' . $game->image) }}" alt="{{ $game->name }}">
                        <h2>{{ $game->name }}</h2>
                        <p>{{ $game->description }}</p>
                        <div class="buttons">
                            <a href="{{ asset('storage/' . $game->html_file) }}" class="play-button">Play</a>
                        </div>
                    </div>                    
                   
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection