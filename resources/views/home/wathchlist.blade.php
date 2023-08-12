@extends('layouts.home.home_layout')
@section('title', 'My Wtachlist')
@push('css')
@endpush


@section('content')




     @auth
          <div class="discovery-recs">
               <div class="container">
                    <div class="discovery-recs-left">
                         <div class="title">
                              <h1>
                                   A place to save your wahchlist
                              </h1>
                         </div>
                    </div>
               </div>
          </div>
          <div class="sort sort-watchlist">
               <div class="container">
                    <div class="top">
                         <button class="active">
                              <i class="fa-solid fa-bookmark"></i>
                              Watch next
                         </button>
                         {{-- <button>
                  <i class="fa-solid fa-check"></i>
                  Caught up
              </button> --}}
                    </div>
                    <div class="bottom">1 title</div>
               </div>
          </div>

          <div class="titles">
               <div class="container">
                    <div class="popular-2">
                         @foreach ($wathchlist as $i)
                              <div class="card-slider-2">
                                   <div class="card">
                                        <div class="image">
                                             <img src="{{ $i->movie->poster_url }}" alt="" height="240" width="210" />
                                        </div>
                                        <div class="content">
                                             <div class="hover">
                                                  <ul>
                                                       <li>
                                                            <a class="book"><i class="fa-solid fa-bookmark"></i></a>
                                                       </li>
                                                       <li>
                                                            <a class="book"><i class="fa-solid fa-check"></i></a>
                                                       </li>
                                                  </ul>
                                             </div>
                                        </div>
                                   </div>
                                   <div class="card-detail">
                                        <div class="title">
                                             <h2></h2>
                                             <span> {{ $i->movie->title }} ({{ $i->movie->release_year }}) </span>
                                        </div>
                                        <div class="card-detail-content text-white mt-1 mb-1">
                                             {!! $i->movie->duration !!}
                                        </div>
                                        <div class="card-detail-rating mt-lg-2">
                                             <span>
                                                  <img src="/assets/home/img/jw-icon.png" alt="" srcset="" />
                                                  84%
                                             </span>
                                             <span>
                                                  <img src="/assets/home/img/imdb-logo.png" alt="" srcset="" />
                                                  7.6(10K)
                                             </span>
                                        </div>
                                        <a href="{{ route('home.movie.movie_detail', $i->movie->id) }}" class="card-detail-button">
                                             {{-- <img src="/assets/home/img/icon (1).webp" alt="" /> --}}
                                             Detail
                                        </a>
                                   </div>
                              </div>
                         @endforeach


                    </div>
               </div>
          </div>

     @endauth
     @guest
          <div class="discovery-recs">
               <div class="container">
                    <div class="discovery-recs-left">
                         <div class="title">
                              <h1 class="text-center">
                                   Please Login to see your watchlist
                              </h1>
                         </div>
                    </div>
               </div>
          </div>
     @endguest



@endsection

<!-- Container-fluid Ends-->
@push('scripts')
@endpush
