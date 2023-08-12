@extends('layouts.home.home_layout')
@section('title', $movie->title)
@push('css')
@endpush


@section('content')
     <div class="banner">
          <video src="https://youtu.be/KU9X4Xyb8JE" poster="/assets/home/img/dark-winds.webp"></video>
          <div class="banner-content">
               <div class="poster">
                    <div class="img">
                         <img src="{{ $movie->poster_url }}" alt="" srcset="" />
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
                                   @foreach ($movie->genres as $genre)
                                        <p>{{ $genre->name }}</p>
                                   @endforeach
                              </div>
                         </div>
                         <div class="title">
                              <h3>RUN TIME</h3>
                              <div class="detail">
                                   <p>{{ $movie->duration }}</p>
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
                              @foreach ($movie->providers as $provider)
                                   <div class="title">
                                        <label for=""> {{ $provider->pivot->typePrice->name }}</label>
                                        <img src="{{ asset($provider->logo) }}" alt="{{ $provider->name }}" height="50" width="50" />
                                        <p>${{ $provider->pivot->price }} <span class="offer__label"> {{ $provider->pivot->resolution->name }} </span></p>
                                   </div>

                              @endforeach

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
                                        <p>2 Seasonsa</p>
                                   </div>
                              </div>
                         </div>
                    </div>
                    {{--
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
                    </div> --}}
                    <div class="banner-watch-4">
                         <h2 class="mb-3">Trailer:</h2>
                         <iframe class="mt-3" width="100%" height="315" src="https://www.youtube.com/embed/{{ $movie->trailer_url }}" title="YouTube video player" frameborder="0"
                              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    </div>
                    <div class="banner-watch-4">
                         <h2>Synopsis</h2>
                         {!! $movie->synopsis !!}
                    </div>


                    <div class="banner-watch-5">
                         <h2>People who liked {{ $movie->title }} also liked</h2>
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
