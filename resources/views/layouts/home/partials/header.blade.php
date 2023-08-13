<div class="header mb-3">
    <div class="container">
        <div class="header-left">
            <a href="{{ route('home') }}" class="header-logo">
                <img src="{{ asset('img/acedia.png') }}" alt="" />
            </a>
        </div>
        <div class="header-right">
            <div class="items">
                <li><a href="{{ route('home') }}" class="{{ routeActive('home') }}">Home</a></li>
                <li><a href="{{ route('new') }}" class="{{ routeActive('new') }}">New</a></li>
                {{-- <li><a href="{{ route('popular') }}" class="{{ routeActive('popular') }}">Popular</a></li> --}}
                <li><a href="{{ route('home.wathchlist') }}" class="{{ routeActive('home.wathchlist') }}">Watchlist</a>
                </li>
            </div>
            <li class="search-icon">
                <label class="icon">
                    {{-- <span class="fas fa-search"></span> --}}
                </label>
                <form action="{{route('search_movie')}}" method="GET">
                    <input type="text" name="search_movie" id="search_movie" placeholder="Search for movies" class="searchInput" autofocus style="margin-left:15px; margin-top:15px"/>
                    <button type="submit" name="search-outline" class="search"><i class="fas fa-search"></i></button>

                    </div>
                </form>
            </li>
            @if (!Auth::check())
                <div class="buttons">
                    <a href="{{ route('login') }}">Sign In</a>
                </div>
            @endif

            <li class="toggleBtn">
                <span class="fas fa-bars"></span>
                <div class="detail">
                    @if (Auth::check())
                        <div class="row text-white">
                            <a href="{{ route('Profile') }}"> Profile </a>
                        </div>
                        <div class="row text-white">
                            <a href="{{ route('dashboard') }}"> Dashboard </a>
                        </div>
                        <div class="row text-white">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="text-dark">Log Out</button>
                            </form>
                        </div>
                    @endif
                    <div class="row text-white">
                        <a href="{{ route('faq') }}"> FAQ </a>
                    </div>
                    <div class="row text-white">
                        <a href="{{ route('feedback') }}"> Feedback </a>
                    </div>
                </div>
            </li>


        </div>
    </div>
</div>
