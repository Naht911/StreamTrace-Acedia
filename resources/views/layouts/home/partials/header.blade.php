<div class="header">
    <div class="container">
        <div class="header-left">
            <a href="home.html" class="header-logo">
                <img src="/assets/home/img/JustWatch-logo-large.webp" alt="" />
            </a>
        </div>
        <div class="header-right">
            <div class="items">
                <li><a href="home.html" class="active">Home</a></li>
                <li><a href="popular.html">New</a></li>
                <li><a href="watchlist.html">Watchlist</a></li>
            </div>
            <li class="search-icon">
                <label class="icon">
                    <span class="fas fa-search"></span>
                </label>
                <input type="text" placeholder="Search for movies" />
            </li>
            @if (Auth::check())
                <div class="buttons">
                    <p>Xin chào, {{ Auth::user()->name }}</p>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit">Log Out</button>
                    </form>
                </div>
            @else
                <div class="buttons">
                    <a href="{{ route('login') }}">Sign In</a>
                </div>
            @endif
            <li class="toggleBtn">
                <span class="fas fa-bars"></span>
                <div class="detail">
                    <div class="">
                        <a href="faq.html"> FAQ </a>
                    </div>
                </div>
            </li>
        </div>
    </div>
</div>
