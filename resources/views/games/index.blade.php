<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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

.play-button, .download-button {
    display: inline-block;
    margin: 5px;
    padding: 10px 15px;
    text-decoration: none;
    color: white;
    background-color: #007bff;
    border-radius: 5px;
}

.download-button {
    background-color: #28a745;
}

    </style>
</head>
<body>
    <div class="game-cards">
        @foreach ($games as $game)
            <div class="game-card">
                <img src="{{ asset('storage/' . $game->image) }}" alt="{{ $game->name }}">
                <h2>{{ $game->name }}</h2>
                <p>{{ $game->description }}</p>
                <div class="buttons">
                    <a href="{{ route('games.show', $game->id) }}" class="play-button">Play</a>
                    <a href="{{ asset('storage/' . $game->html_file) }}" download class="download-button">Download</a>
                </div>
            </div>
        @endforeach
    </div>
</body>
</html>


