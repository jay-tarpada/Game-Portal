@extends('layout.app')
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .back-button {
            display: inline-block;
            padding: 10px 15px;
            margin-top: 20px;
            background-color: #e12c04;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .back-button:hover {
            background-color: #a80202;
        }

        iframe {
            display: block;
            width: 100%;
            height: 500px; /* Set a default height for iframe */
            border: none;
        }

        iframe:fullscreen {
            height: 100vh; /* Full height in fullscreen */
            width: 100vw;
        }

        iframe:-webkit-full-screen {
            height: 100vh; /* Safari-specific */
            width: 100vw;
        }

        iframe:-moz-full-screen {
            height: 100vh; /* Firefox-specific */
            width: 100vw;
        }

        .buttons {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .fullscreen-btn {
            background-color: transparent;
            color: #28a745;
            border: none;
            font-size: 20px;
            cursor: pointer;
            display: flex;
            align-items: center;
            margin-right: 10px; /* Adds space from the right */
        }

        .fullscreen-btn i {
            margin-right: 8px; /* Adds space between the icon and text */
        }

        .fullscreen-btn:hover {
            color: #218838;
        }
    </style>
    <script>
        function toggleFullscreen() {
            const iframe = document.querySelector('iframe');
            if (iframe.requestFullscreen) {
                iframe.requestFullscreen();
            } else if (iframe.mozRequestFullScreen) { // Firefox
                iframe.mozRequestFullScreen();
            } else if (iframe.webkitRequestFullscreen) { // Chrome, Safari and Opera
                iframe.webkitRequestFullscreen();
            } else if (iframe.msRequestFullscreen) { // IE/Edge
                iframe.msRequestFullscreen();
            }
        }
    </script>
</head>

@section('body1')

<h1 style="color: white">{{ $game->name }}</h1> 
<p style="color: rgb(161, 159, 159)">
    {{$game->description}}
</p>

<div class="buttons">
    <a href="{{ url('/') }}" class="back-button">Back</a>
    
    <!-- Full-Screen Button aligned to the right with text -->
    <button class="fullscreen-btn" onclick="toggleFullscreen()">
        <i class="fas fa-expand"></i> Full Screen
    </button>
</div>

<iframe src="{{ asset('storage/' . $game->html_file) }}" frameborder="1"></iframe>

@endsection
