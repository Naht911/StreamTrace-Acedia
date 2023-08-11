<header class="main-nav">
     <div class="sidebar-user text-center">

          <img class="img-90 rounded-circle" src="/assets/images/dashboard/1.png" alt="">
          <div class="badge-bottom"><span class="badge badge-primary">Admin</span></div><a href="#">
               <h6 class="mt-3 f-14 f-w-600">Name</h6>
          </a>
     </div>
     <nav>
          <div class="main-navbar">
               <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
               <div id="mainnav">
                    <ul class="nav-menu custom-scrollbar">
                         <li class="back-btn">
                              <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                         </li>
                         <li class="sidebar-main-title">
                              <div>
                                   <h6>Streaming Services </h6>
                              </div>
                         </li>
                         <li class="dropdown"><a class="nav-link menu-title my-2" href="javascript:void(0)">
                                   <i class="fa-solid fa-diagram-project"></i>
                                   <span>Providers</span>
                              </a>
                              <ul class="nav-submenu menu-content">
                                   <li>
                                        <a class="" href="#">
                                             <i class="fa-solid fa-plus"></i>
                                             <span>
                                                  Add New Provider
                                             </span>
                                        </a>
                                   </li>
                                   <li>
                                        <a class="" href="#">
                                             <i class="fa-solid fa-list"></i>
                                             <span>
                                                  List Provider
                                             </span>
                                        </a>
                                   </li>

                              </ul>
                         </li>

                         <li class="dropdown">
                              <a class="nav-link menu-title my-2  {{ prefixActive('dashboard/movie') }}" href="javascript:void(0)">
                                   <i data-feather="monitor"></i>
                                   <span>Movie</span>
                              </a>
                              <ul class="nav-submenu menu-content" style="display: {{ prefixBlock('dashboard/movie') }};">
                                   <li>
                                        <a href="{{ route('dashboard.movie.create_movie') }}" class="{{ routeActive('dashboard.movie.create_movie') }}">
                                             <i class="fa-solid fa-plus"></i>
                                             <span>Add New Movie</span>
                                        </a>
                                   </li>
                                   <li>
                                        <a href="{{ route('dashboard.movie.list_movie') }}" class="{{ routeActive('dashboard.movie.list_movie') }}">
                                             <i class="fa-solid fa-list"></i>
                                             <span>List Movie</span>
                                        </a>
                                   </li>
                                   <li>
                                        <a class="submenu-title" href="javascript:void(0)">
                                             <i class="fa-solid fa-tags"></i>
                                             <span>Genre</span>
                                        </a>
                                        <ul class="nav-sub-childmenu submenu-content" style="display: block;">
                                             <li>
                                                  <a href="{{ route('dashboard.movie.create_genre') }}" class="{{ routeActive('dashboard.movie.create_genre') }}">
                                                       <i class="fa-solid fa-plus"></i>
                                                       <span> Create Genre </span>
                                                  </a>
                                             </li>
                                             <li>
                                                  <a href="#" class="">
                                                       <i class="fa-solid fa-list"></i>
                                                       <span> List Genre </span>
                                                  </a>
                                             </li>
                                        </ul>
                                   </li>
                              </ul>
                         </li>
                         <li><a class="nav-link menu-title link-nav my-2" href="#"><i data-feather="user"></i><span>USer</span></a></li>
                         <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="airplay"></i><span>Performance</span></a>
                              <ul class="nav-submenu menu-content">
                                   <li><a href="{{ route('dashboard.performance.user_performance') }}" class="{{ routeActive('dashboard.performance.user_performance') }}"><i data-feather="bookmark"></i><span>User Performance</span></a></li>
                                   <li><a class="" href="#"><i data-feather="bookmark"></i><span>Top Bookmark</span></a></li>
                                   <li><a class="" href="#"><i data-feather="globe"></i><span>Top Streaming Service</span></a></li>
                              </ul>
                         </li>

                         <li><a class="nav-link menu-title link-nav my-2" href="#"><i data-feather="help-circle"></i><span>FAQ</span></a></li>
                    </ul>
               </div>
               <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
          </div>
     </nav>
</header>
