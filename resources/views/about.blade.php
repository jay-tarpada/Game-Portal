@extends('layout.app')
<head>
    <style>
        img{
            width: 300px;
        }
       
    </style>
</head>
@section('body1')

<section class="blog-details spad">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-8">
                <div class="blog__details__title">
                    <h6>Games, Community <span>- Updated: {{ date('F d, Y') }}</span></h6>
                    <h2>About Our Game Portal: Explore, Play, and Connect</h2>
                    {{-- <div class="blog__details__social">
                        <a href="#" class="facebook"><i class="fa fa-facebook-square"></i> Facebook</a>
                        <a href="#" class="pinterest"><i class="fa fa-pinterest"></i> Pinterest</a>
                        <a href="#" class="linkedin"><i class="fa fa-linkedin-square"></i> Linkedin</a>
                        <a href="#" class="twitter"><i class="fa fa-twitter-square"></i> Twitter</a>
                    </div> --}}
                </div>
            </div>
            <div class="col-lg-12">
                <div class="blog__details__pic">
                    <img src="img/1.png" alt="logo">
                </div>
            </div>
            <div class="col-lg-8">
                <div class="blog__details__content">
                    <div class="blog__details__text">
                        <p>Welcome to our Game Portal! We’re dedicated to bringing you an exciting selection of games that cater to all kinds of players. Whether you're looking for action, adventure, or something more relaxing, our portal has something special for you.</p>
                    </div>
                    <div class="blog__details__item__text">
                        <h4>Explore a World of Games:</h4>
                        <img src="img/1games.jpg" alt="">
                        <p>Our platform offers a wide array of games from different genres, ensuring there’s always something new to experience. Discover thrilling adventures, challenge yourself with complex puzzles, or dive into action-packed arenas. Our carefully curated collection is designed to provide a unique gaming experience.</p>
                    </div>
                    <div class="blog__details__item__text">
                        <h4>Join Our Gaming Community:</h4>
                        <img src="img/2games.jpg" alt="">
                        <p>Our portal is not only a place to play games but also a place to connect with fellow gamers. Join our community to discuss the latest games, share your achievements, and make new friends who share your passion for gaming.</p>
                    </div>
                    <div class="blog__details__item__text">
                        <h4>Constantly Growing:</h4>
                        <img src="img/3games.jpg" alt="">
                        <p>We’re always expanding our platform, adding new games, and enhancing features to keep things fresh and engaging. Stay tuned as we continue to grow and improve, bringing you even more ways to enjoy your favorite games.</p>
                    </div>
                    
                    {{-- <div class="blog__details__form">
                        <h4>Leave A Comment</h4>
                        <form action="#">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <input type="text" placeholder="Name">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <input type="text" placeholder="Email">
                                </div>
                                <div class="col-lg-12">
                                    <textarea placeholder="Message"></textarea>
                                    <button type="submit" class="site-btn">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
