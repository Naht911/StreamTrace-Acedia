<div class="header mb-3">
     <div class="container">
          <div class="header-left">
               <a href="{{ route('home') }}" class="header-logo">
                    <img src="/assets/home/img/JustWatch-logo-large.webp" alt="" />
               </a>
          </div>
          <div class="header-right">
               <div class="items">
                    <li><a href="{{ route('home') }}" class="{{ routeActive('home') }}">Home</a></li>
                    {{-- <li><a href="popular.html">New</a></li> --}}
                    <li><a href="{{ route('home.wathchlist') }}" class="{{ routeActive('home.wathchlist') }}">Watchlist</a></li>
               </div>
               <li class="search-icon">
                    <label class="icon">
                         <span class="fas fa-search"></span>
                    </label>
                    <input type="text" placeholder="Search for movies" />
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
                                   <a href="faq.html"> Profile </a>
                              </div>
                              <div class="row text-white">
                                   <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="text-dark">Log Out</button>
                                   </form>
                              </div>
                         @endif
                         <div class="row text-white">
                              <a href="faq.html"> FAQ </a>
                         </div>
                    </div>
               </li>


          </div>
     </div>
</div>
