@extends('layouts.home.home_layout')
@section('title', $movie->title)
@push('css')
@endpush


@section('content')
    <style>
        .star-rating {
            white-space: nowrap;
        }

        .star-rating [type="radio"] {
            display: none;
        }

        .star-rating i {
            font-size: 1.2em;
            transition: 0.3s;
        }

        .star-rating label:is(:hover, :has(~ :hover)) i {
            transform: scale(1.35);
            color: #fffdba;
            animation: jump 0.5s calc(0.3s + (var(--i) - 1) * 0.15s) alternate infinite;
        }

        .star-rating label:has(~ :checked) i {
            color: #faec1b !important;
            text-shadow: 0 0 2px #ffffff, 0 0 10px #ffee58;
        }

        @keyframes jump {

            0%,
            50% {
                transform: translatey(0) scale(1.35);
            }

            100% {
                transform: translatey(-15%) scale(1.35);
            }
        }
    </style>
    <div class="banner">
        <video src="https://youtu.be/KU9X4Xyb8JE" poster="{{ $movie->poster_url }}"></video>
        <div class="banner-content">
            <div class="poster">
                <div class="img">
                    <img src="{{ $movie->poster_url }}" alt="" srcset="" />
                    <div class="content">
                        <li>

                            <a id="track" data-id="{{ $movie->id }}">
                                <i
                                    class="fa-solid fa-bookmark {{ isset($reaction) && $reaction->is_tracked == 1 ? 'active' : null }}"></i>
                                Track Show
                            </a>
                        </li>
                        <li>
                            <a id="watched" data-id="{{ $movie->id }}">
                                <i
                                    class="fa-solid fa-check-double {{ isset($reaction) && $reaction->is_watched == 1 ? 'active' : null }}"></i>
                                Watched
                            </a>
                        </li>
                        <li>
                            <a id="thumbs_up" data-id="{{ $movie->id }}">
                                <i
                                    class="fa-solid fa-thumbs-up {{ isset($reaction) && $reaction->is_thumbs_up == 1 ? 'active' : null }}"></i>
                                Like
                            </a>
                        </li>
                        <li>
                            <a id="thumbs_down" data-id="{{ $movie->id }}">
                                <i
                                    class="fa-solid fa-thumbs-down {{ isset($reaction) && $reaction->is_thumbs_down == 1 ? 'active' : null }}"></i>
                                Dislike
                            </a>
                        </li>
                    </div>
                </div>
                {{-- Star Rating --}}
                <p  class="text-center text-xl my-10" style="margin: 10px auto;"><span class="star-rating" id="star-rating" data-id="{{ $movie->id }}">

                    <label for="rate-1" style="--i:1"><i class="fa-solid fa-star text-white"></i></label>
                    <input type="radio" name="rating" id="rate-1" value="1" {{isset($rating) && $rating->rating == 1 ? 'checked' : ''}}>
                    <label for="rate-2" style="--i:2"><i class="fa-solid fa-star text-white"></i></label>
                    <input type="radio" name="rating" id="rate-2" value="2" {{isset($rating) && $rating->rating == 2 ? 'checked' : '' }}>
                    <label for="rate-3" style="--i:3"><i class="fa-solid fa-star text-white"></i></label>
                    <input type="radio" name="rating" id="rate-3" value="3" {{isset($rating) && $rating->rating == 3 ? 'checked' : '' }}>
                    <label for="rate-4" style="--i:4"><i class="fa-solid fa-star text-white"></i></label>
                    <input type="radio" name="rating" id="rate-4" value="4" {{isset($rating) && $rating->rating == 4 ? 'checked' : '' }}>
                    <label for="rate-5" style="--i:5"><i class="fa-solid fa-star text-white"></i></label>
                    <input type="radio" name="rating" id="rate-5" value="5" {{isset($rating) && $rating->rating == 5 ? 'checked' : '' }}>
                </span></p>
            {{-- End Star Rating --}}
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
                            <p>{{ $movie->country }}</p>
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
                            <div class="title text-sm-center">
                                <a href="{{ route('home.outsite', ['movie_id' => $movie->id, 'url' => $provider->pivot->url]) }}"
                                    class="text-sm-center" target="_blank">
                                    <label for="" class="text-sm-center">
                                        {{ $provider->pivot->typePrice->name }}</label>
                                    <img src="{{ asset($provider->logo) }}" alt="{{ $provider->name }}" height="50"
                                        width="50" />
                                    <p>${{ $provider->pivot->price }} <span class="offer__label">
                                            {{ $provider->pivot->resolution->name }} </span></p>
                                </a>

                            </div>
                        @endforeach

                    </div>
                </div>

                {{-- <div class="banner-watch-2">

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
                    </div> --}}
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
                    <iframe class="mt-3" width="100%" height="315"
                        src="https://www.youtube.com/embed/{{ $movie->trailer_url }}" title="YouTube video player"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                </div>
                <div class="banner-watch-4">
                    <h2>Synopsis</h2>
                    {!! $movie->synopsis !!}
                </div>


                {{-- <div class="banner-watch-5">
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
                    </div> --}}
            </div>
        </div>
    </div>


@endsection

<!-- Container-fluid Ends-->
@push('scripts')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var id = $("#track").data("id");
            $("#track").click(function() {
                $.ajax({
                    url: "{{ route('home.movie.handle_reaction') }}",
                    method: 'POST',
                    dataType: "json",
                    data: {
                        id: id,
                        act: 'tracked',
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(result) {
                        if (result.is_tracked) {
                            $('.fa-bookmark').addClass("active");
                        } else {
                            $('.fa-bookmark').removeClass("active");
                        }

                    },
                    error: function(e) {
                        console.log(e)
                    }
                });
            });

            $("#thumbs_up").click(function() {
                $.ajax({
                    url: "{{ route('home.movie.handle_reaction') }}",
                    method: 'POST',
                    dataType: "json",
                    data: {
                        id: id,
                        act: 'thumbs_up',
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(result) {


                        if (result.is_thumbs_up) {
                            $('.fa-thumbs-up').addClass("active");
                        } else {
                            $('.fa-thumbs-up').removeClass("active");
                        }
                        if (result.is_thumbs_down) {
                            $('.fa-thumbs-down').addClass("active");
                        } else {
                            $('.fa-thumbs-down').removeClass("active");
                        }
                    },
                    error: function(e) {
                        console.log(e)
                    }
                });
            });
            $("#thumbs_down").click(function() {
                $.ajax({
                    url: "{{ route('home.movie.handle_reaction') }}",
                    method: 'POST',
                    dataType: "json",
                    data: {
                        id: id,
                        act: 'thumbs_down',
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(result) {
                        console.log(result);

                        if (result.is_thumbs_down) {
                            $('.fa-thumbs-down').addClass("active");
                        } else {
                            $('.fa-thumbs-down').removeClass("active");
                        }
                        if (result.is_thumbs_up) {
                            $('.fa-thumbs-up').addClass("active");
                        } else {
                            $('.fa-thumbs-up').removeClass("active");
                        }
                    },
                    error: function(e) {
                        console.log(e)
                    }
                });
            });
            $("#watched").click(function() {
                $.ajax({
                    url: "{{ route('home.movie.handle_reaction') }}",
                    method: 'POST',
                    dataType: "json",
                    data: {
                        id: id,
                        act: 'watched',
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(result) {
                        console.log(result);
                        if (result.is_watched) {
                            $('.fa-check-double').addClass("active");
                        } else {
                            $('.fa-check-double').removeClass("active");
                        }
                    },
                    error: function(e) {
                        console.log(e)
                    }
                });
            });

        });
        $(document).ready(function() {
            var id = $(".star-rating").data("id");
            // var rating = $('input[name="rating"]:checked').val();

            console.log('ok', id);

            $(".star-rating input").click(function() {
                 var rating = $('input[name="rating"]:checked').val();
                 console.log('rating', rating);
                $.ajax({
                    url: "{{ route('home.movie.handle_rating') }}",
                    method: 'POST',
                    dataType: "json",
                    data: {
                        id: id,
                        rating: rating,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(result) {
                        console.log(result);
                    },
                    error: function(e) {
                        console.log(e)
                    }
                });
            });
        });
    </script>
@endpush
