@extends('layouts.home.home_layout')
@section('title', 'Home')
@push('css')
@endpush


@section('content')
     <div class="banner">
          <video src="https://youtu.be/KU9X4Xyb8JE" poster="/assets/home/img/dark-winds.webp"></video>
          <div class="banner-content">
               <div class="poster">
                    <div class="img">
                         <img src="/assets/home/img/dark-winds (1).webp" alt="" srcset="" />
                         <div class="content">
                              <li>
                                   <a><i class="fa-solid fa-bookmark"></i> Track Show</a>
                              </li>
                              <li>
                                   <a>
                                        <i class="fa-solid fa-check"></i>
                                        See All
                                   </a>
                              </li>
                              <li>
                                   <a><i class="fa-regular fa-thumbs-up"></i> Like</a>
                              </li>
                              <li>
                                   <a><i class="fa-regular fa-thumbs-down"></i> Dislike</a>
                              </li>
                         </div>
                    </div>
                    <div class="poster-content">
                         <div class="title">
                              <h3>RATING</h3>
                              <div class="detail">
                                   <span>
                                        <img src="/assets/home/img/jw-icon.png" alt="" srcset="" />
                                        84%
                                   </span>
                                   <span>
                                        <img src="/assets/home/img/imdb-logo.png" alt="" srcset="" />
                                        7.6(10K)
                                   </span>
                              </div>
                         </div>
                         <div class="title">
                              <h3>GENRE</h3>
                              <div class="detail">
                                   <p>Drama</p>
                                   <p>Drama</p>
                                   <p>Drama</p>
                                   <p>Drama</p>
                              </div>
                         </div>
                         <div class="title">
                              <h3>RUN TIME</h3>
                              <div class="detail">
                                   <p>46 min</p>
                              </div>
                         </div>
                         <div class="title">
                              <h3>Age rating</h3>
                              <div class="detail">
                                   <p>TV-MA</p>
                              </div>
                         </div>
                         <div class="title">
                              <h3>Production country</h3>
                              <div class="detail">
                                   <p>United States</p>
                              </div>
                         </div>
                    </div>
               </div>
               <div class="info-content">
                    <div class="banner-title">
                         <h1>{{ $movie->title }}</h1>
                         <span>({{ $movie->release_year }})</span>
                    </div>

                    <div class="banner-watch">
                         <h2>WATCH NOW</h2>
                         <div class="banner-watch-image">
                              <div class="title">
                                   <label for=""> Stream</label>
                                   <img src="/assets/home/img/icon (1).webp" alt="" />
                                   <p>2 Seasons <span>HD</span></p>
                              </div>
                              <div class="title">
                                   <label for=""> BUY</label>
                                   <img src="/assets/home/img/icon (1).webp" alt="" />
                                   <p>2 Seasons</p>
                              </div>
                         </div>
                    </div>

                    <div class="banner-watch-2">
                         <h2>WATCH NOW</h2>
                         <div class="filter">
                              <i class="fa-solid fa-filter"></i> <span>FILTERS</span>
                              <button class="active">Best Price</button>
                              <button>Free</button>
                              <button>SD</button>
                              <button>HD</button>
                              <button>4K</button>
                         </div>
                         <div class="banner-watch-content">
                              <div class="banner-watch-title stream">STREAM</div>
                              <div class="banner-watch-image">
                                   <div class="title">
                                        <img src="/assets/home/img/icon (1).webp" alt="" />
                                        <p>2 Seasons <span>HD</span></p>
                                   </div>
                                   <div class="title">
                                        <img src="/assets/home/img/icon (1).webp" alt="" />
                                        <p>2 Seasons</p>
                                   </div>
                              </div>
                         </div>
                         <div class="banner-watch-content">
                              <div class="banner-watch-title buy">BUY</div>
                              <div class="banner-watch-image">
                                   <div class="title">
                                        <img src="/assets/home/img/icon (1).webp" alt="" />
                                        <p>2 Seasons <span>HD</span></p>
                                   </div>
                                   <div class="title">
                                        <img src="/assets/home/img/icon (1).webp" alt="" />
                                        <p>2 Seasons</p>
                                   </div>
                              </div>
                         </div>
                    </div>

                    <div class="banner-watch-3">
                         <h2>2 SEASONS</h2>
                         <div class="season2 swiper-wrapper">
                              <a href="" class="content swiper-slide">
                                   <img src="/assets/home/img/dark-winds (1).webp" alt="" />
                                   <div class="title">Season 2</div>
                              </a>
                              <a href="" class="content swiper-slide">
                                   <img src="/assets/home/img/dark-winds (1).webp" alt="" />
                                   <div class="title">Season 2</div>
                              </a>
                              <a href="" class="content swiper-slide">
                                   <img src="/assets/home/img/dark-winds (1).webp" alt="" />
                                   <div class="title">Season 2</div>
                              </a>
                              <a href="" class="content swiper-slide">
                                   <img src="/assets/home/img/dark-winds (1).webp" alt="" />
                                   <div class="title">Season 2</div>
                              </a>
                              <a href="" class="content swiper-slide">
                                   <img src="/assets/home/img/dark-winds (1).webp" alt="" />
                                   <div class="title">Season 2</div>
                              </a>
                         </div>
                    </div>

                    <div class="banner-watch-4">
                         <h2>Synopsis</h2>
                         {!! $movie->synopsis !!}
                    </div>

                    <div class="banner-watch-4">
                         <h2>Dark Winds - watch online: streaming, buy or rent</h2>
                         <p>
                              Currently you are able to watch "Dark Winds" streaming on AMC Plus Apple TV Channel , AMC+
                              Amazon Channel, AMC+, AMC, Spectrum On Demand, AMC+ Roku Premium Channel, Acorn TV or for
                              free with ads on The Roku Channel. It is also possible to buy "Dark Winds" as download on
                              Amazon Video, Vudu, Apple TV, Google Play Movies, Microsoft Store.
                         </p>
                    </div>

                    <div class="banner-watch-5">
                         <h2>People who liked Dark Winds also liked</h2>
                         <div class="card-sliders">
                              <div class="card-slider swiper-wrapper">
                                   <div class="card swiper-slide">
                                        <div class="image">
                                             <img src="/assets/home/img/guardians-of-the-galaxy-vol-3.webp" alt="" />
                                        </div>
                                        <div class="hover">
                                             <ul>
                                                  <li>
                                                       <a class="fa-icon"><i class="fa-solid fa-bookmark"></i></a>
                                                  </li>
                                             </ul>
                                        </div>
                                   </div>
                                   <div class="card swiper-slide">
                                        <div class="image">
                                             <img src="/assets/home/img/guardians-of-the-galaxy-vol-3.webp" alt="" />
                                        </div>
                                        <div class="hover">
                                             <ul>
                                                  <li>
                                                       <a class="fa-icon"><i class="fa-solid fa-bookmark"></i></a>
                                                  </li>
                                             </ul>
                                        </div>
                                   </div>
                                   <div class="card swiper-slide">
                                        <div class="image">
                                             <img src="/assets/home/img/guardians-of-the-galaxy-vol-3.webp" alt="" />
                                        </div>
                                        <div class="hover">
                                             <ul>
                                                  <li>
                                                       <a class="fa-icon"><i class="fa-solid fa-bookmark"></i></a>
                                                  </li>
                                             </ul>
                                        </div>
                                   </div>
                                   <div class="card swiper-slide">
                                        <div class="image">
                                             <img src="/assets/home/img/guardians-of-the-galaxy-vol-3.webp" alt="" />
                                        </div>
                                        <div class="hover">
                                             <ul>
                                                  <li>
                                                       <a class="fa-icon"><i class="fa-solid fa-bookmark"></i></a>
                                                  </li>
                                             </ul>
                                        </div>
                                   </div>
                                   <div class="card swiper-slide">
                                        <div class="image">
                                             <img src="/assets/home/img/guardians-of-the-galaxy-vol-3.webp" alt="" />
                                        </div>
                                        <div class="hover">
                                             <ul>
                                                  <li>
                                                       <a class="fa-icon"><i class="fa-solid fa-bookmark"></i></a>
                                                  </li>
                                             </ul>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>


@endsection

<!-- Container-fluid Ends-->
@push('scripts')
@endpush
