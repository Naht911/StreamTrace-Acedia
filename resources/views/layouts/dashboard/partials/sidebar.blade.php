<header class="main-nav">
    <div class="sidebar-user d-flex justify-start items-center">
        <div><img class="rounded-full" src="/assets/images/dashboard/1.png" alt=""></div>

        <div class="ml-5">
            <div class="text-xl font-bold">Name</div>
            <span class="badge badge-primary">Admin</span>
        </div>

    </div>
    <nav>
        <div class="main-navbar">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="mainnav">
                <ul class="nav-menu custom-scrollbar">
                    <li class="back-btn">
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2"
                                aria-hidden="true"></i></div>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title my-2 {{ prefixActive('dashboard/provider') }}"
                            href="javascript:void(0)">
                            <p class="mt-1"><i class="fa-brands fa-youtube mb-1"></i>Service Providers</p>
                        </a>
                        <ul class="nav-submenu menu-content" style="display: {{ prefixBlock('dashboard/provider') }};">
                            <li>
                                <a href="{{ route('dashboard.provider.create_provider') }}"
                                    class="my-2 {{ routeActive('dashboard.provider.create_provider') }}">
                                    <i class="fa-solid fa-plus mb-1"></i><span>Add New Provider</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('dashboard.provider.list_provider') }}"
                                    class="my-2 {{ routeActive('dashboard.provider.list_provider') }}">
                                    <i class="fa-solid fa-list mb-1"></i><span>List of Providers</span>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="dropdown">
                        <a class="nav-link menu-title my-2  {{ prefixActive('dashboard/movie') }}"
                            href="javascript:void(0)">
                            <p class="mt-1"><i class="fa-solid fa-video mb-1"></i>Movies</p>
                        </a>
                        <ul class="nav-submenu menu-content" style="display: {{ prefixBlock('dashboard/movie') }};">
                            <li>
                                <a href="{{ route('dashboard.movie.create_movie') }}"
                                    class="{{ routeActive('dashboard.movie.create_movie') }}">
                                    <i class="fa-solid fa-plus mb-1"></i><span>Add New Movie</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('dashboard.movie.list_movie') }}"
                                    class="{{ routeActive('dashboard.movie.list_movie') }}">
                                    <i class="fa-solid fa-list mb-1"></i><span>List of Movies</span>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="dropdown">
                        <a class="nav-link menu-title my-2 " href="javascript:void(0)">
                            <p class="mt-1"><i class="fa-solid fa-video mb-1"></i>Genre</p>
                        </a>
                        <ul class="nav-submenu menu-content" style="display: block;">
                            <li>
                                <a href="{{ route('dashboard.movie.create_genre') }}"
                                    class="{{ routeActive('dashboard.movie.create_genre') }}">
                                    <i class="fa-solid fa-plus mb-1"></i><span> Create Genre </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('dashboard.movie.list_genre') }}"
                                    class="{{ routeActive('dashboard.movie.list_genre') }}">
                                    <i class="fa-solid fa-list mb-1"></i><span> List Genre </span>
                                </a>
                            </li>
                        </ul>

                    </li>

                    {{-- <li>
                        <a class="nav-link menu-title link-nav my-2" href="#">
                            <p class="mt-1"><i class="fa-solid fa-user mb-1"></i>Users</p>
                        </a>
                    </li> --}}
                    <li class="dropdown">
                        <a class="nav-link menu-title my-2 " href="javascript:void(0)">
                            <p class="mt-1"><i class="fa-solid fa-video mb-1"></i>Users</p>
                        </a>
                        <ul class="nav-submenu menu-content" style="display: block;">
                            <li>
                                <a href="{{ route('dashboard.user.list_user') }}"
                                    class="{{ routeActive('dashboard.user.list_user') }}">
                                    <i class="fa-solid fa-list mb-1"></i><span> List User </span>
                                </a>
                            </li>
                        </ul>

                    </li>



                    <li class="dropdown">
                        <a class="nav-link menu-title my-2 " href="javascript:void(0)">
                            <p class="mt-1"><i class="fa-solid fa-chart-simple mb-1"></i></i>Performance</p>
                        </a>
                        <ul class="nav-submenu menu-content" style="display: block;">
                            <li>
                                <a href="{{ route('dashboard.performance.user_performance') }}"
                                    class="{{ routeActive('dashboard.performance.user_performance') }}">
                                    <i class="fa-solid fa-magnifying-glass-chart mb-1"></i><span> User Performance
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="">
                                    <i class="fa-solid fa-ranking-star mb-1"></i><span> Top Bookmark </span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="">
                                    <i class="fa-solid fa-ranking-star mb-1"></i><span> Top Streaming Service </span>
                                </a>
                            </li>
                        </ul>

                    </li>
                    <li>
                        <a class="nav-link menu-title link-nav my-2" href="{{ route('dashboard.feedback') }}">
                            <p class="mt-1"><i class="far fa-flag mb-1"></i>Feedback</p>
                        </a>
                    </li>

                    <li>
                        <a class="nav-link menu-title link-nav my-2" href="{{ route('dashboard.FAQ') }}"href="#">
                            <p class="mt-1"><i class="fa-solid fa-circle-question mb-1"></i>FAQ</p>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </div>
    </nav>
</header>
