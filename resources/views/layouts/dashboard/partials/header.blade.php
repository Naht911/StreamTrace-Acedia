    <div class="page-main-header">
         <div class="main-header-right row m-0">
              <div class="main-header-left">
                   <div class="logo-wrapper">
                        <a href="index.html">
                             <img class="img-fluid" src="{{asset('img/acedia.png')}}" alt="a">
                        </a>
                   </div>
                   <div class="dark-logo-wrapper">
                        <a href="index.html">
                             <img class="img-fluid" src="{{asset('img/acedia.png')}}" alt="a">
                        </a>
                   </div>
                   <div class="toggle-sidebar"><i class="status_toggle middle" data-feather="align-center" id="sidebar-toggle"></i></div>
              </div>

              <div class="nav-right col pull-right right-menu p-0">
                   <ul class="nav-menus">
                        <li><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i data-feather="maximize"></i></a></li>
                        <li class="onhover-dropdown">
                             <div class="bookmark-box"><i data-feather="star"></i></div>
                             <div class="bookmark-dropdown onhover-show-div">
                                  <div class="form-group mb-0">
                                       <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-search"></i></span></div>
                                            <input class="form-control" type="text" placeholder="Search for bookmark...">
                                       </div>
                                  </div>
                                  <ul class="m-t-5">
                                       <li class="add-to-bookmark"><i class="bookmark-icon" data-feather="inbox"></i>Email<span class="pull-right"><i data-feather="star"></i></span></li>
                                       <li class="add-to-bookmark"><i class="bookmark-icon" data-feather="message-square"></i>Chat<span class="pull-right"><i data-feather="star"></i></span></li>
                                       <li class="add-to-bookmark"><i class="bookmark-icon" data-feather="command"></i>Feather
                                            Icon<span class="pull-right"><i data-feather="star"></i></span></li>
                                       <li class="add-to-bookmark"><i class="bookmark-icon" data-feather="airplay"></i>Widgets<span class="pull-right"><i data-feather="star"> </i></span></li>
                                  </ul>
                             </div>
                        </li>
                        <li class="onhover-dropdown">
                             <div class="notification-box"><i data-feather="bell"></i><span class="dot-animated"></span>
                             </div>
                             <ul class="notification-dropdown onhover-show-div">
                                  <li>
                                       <p class="f-w-700 mb-0">You have 3 Notifications<span class="pull-right badge badge-primary badge-pill">4</span></p>
                                  </li>
                                  <li class="noti-primary">
                                       <div class="media"><span class="notification-bg bg-light-primary"><i data-feather="activity"> </i></span>
                                            <div class="media-body">
                                                 <p>Delivery processing </p><span>10 minutes ago</span>
                                            </div>
                                       </div>
                                  </li>
                             </ul>
                        </li>

                        <li class="onhover-dropdown"><i data-feather="message-square"></i>
                             <ul class="chat-dropdown onhover-show-div">
                                  <li>
                                       <div class="media"><img class="img-fluid rounded-circle me-3" src="#" alt="a">
                                            <div class="media-body"><span>Ain Chavez</span>
                                                 <p class="f-12 light-font">Lorem Ipsum is simply dummy...</p>
                                            </div>
                                            <p class="f-12">32 mins ago</p>
                                       </div>
                                  </li>
                                  <li class="text-center"> <a class="f-w-700" href="javascript:void(0)">See All </a></li>
                             </ul>
                        </li>
                        <li class="onhover-dropdown p-0">
                             <button class="btn btn-primary-light" type="button"><a href="login_two.html"><i data-feather="log-out"></i>Log out</a></button>
                        </li>
                   </ul>
              </div>
              <div class="d-lg-none mobile-toggle pull-right w-auto"><i data-feather="more-horizontal"></i></div>
         </div>
    </div>
