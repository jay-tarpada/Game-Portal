<!-- Header Section Begin -->
<header class="header">
    <div class="container">
        <div class="row">
            <div class="col-lg-2">
                <div class="header__logo">
                    <a href="{{ url('/') }}">
                        <img src="{{url('img/1.png')}}" alt="Game Portal">
                    </a>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="header__nav">
                    <nav class="header__menu mobile-menu">
                        <ul>
                            <li class="{{ Request::is('/') ? 'active' : '' }}"><a href="{{ url('/') }}">Homepage</a></li>
                            <li class="{{ Request::is('about') ? 'active' : '' }}"><a href="{{ route('about') }}">About</a></li>
                            <li class="{{ Request::is('contact') ? 'active' : '' }}"><a href="{{ route('contact') }}">Contact</a></li>

                            <!-- Show these links only if the user is not logged in -->
                            @if (!auth()->check())
                                <li class="{{ Request::is('login') ? 'active' : '' }}"><a href="{{ route('login') }}">Login</a></li>
                                <li class="{{ Request::is('signup') ? 'active' : '' }}"><a href="{{ route('signup') }}">Signup</a></li>
                            @else
                                <!-- Optionally, show a logout button or profile link when logged in -->
                                <li style="color: green">{{ Auth::user()->name }}</li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Logout</button>
                                    </form>
                                </li>
                            @endif
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div id="mobile-menu-wrap"></div>
    </div>
</header>
<!-- Header End -->
