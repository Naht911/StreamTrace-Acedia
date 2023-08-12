@extends('layouts.home.home_layout')
@section('title', 'Home')
@push('css')
    <link href="{{ asset('vendor/bladewind/css/animate.min.css') }}" rel="stylesheet" />

    <link href="{{ asset('vendor/bladewind/css/bladewind-ui.min.css') }}" rel="stylesheet" />
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
            color: #faec1b;
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
        <video src="https://youtu.be/KU9X4Xyb8JE" poster="/assets/home/img/dark-winds.webp"></video>
        <div class="banner-content">
            <div class="poster">
                <div class="img">
                    <img src="/assets/home/img/dark-winds (1).webp" style="width:100%; height:570px; object-fit: cover;"
                        alt="" srcset="" />
                    <div class="content" style="justify-content: space-around;">
                        <li>

                            <a id="check" data-id="{{ $movie->id }}">
                                <i class="fa-solid fa-bookmark {{ $reaction->is_tracked == 1 ? 'active' : null }}"></i>
                                Track Show
                            </a>
                        </li>
                        <li>
                            <a id="thumbs_up" data-id="{{ $movie->id }}">
                                <i class="fa-solid fa-thumbs-up {{ $reaction->is_thumbs_up == 1 ? 'active' : null }}"></i>
                                Like
                            </a>
                        </li>
                        <li>
                            <a id="thumbs_down" data-id="{{ $movie->id }}">
                                <i
                                    class="fa-solid fa-thumbs-down {{ $reaction->is_thumbs_down == 1 ? 'active' : null }}"></i>
                                Dislike
                            </a>
                        </li>
                    </div>
                </div>
                {{-- Star Rating --}}

                <p  class="text-center text-xl my-10" style="margin: 10px auto;"><span class="star-rating" id="star-rating" data-id="{{ $movie->id }}">
                        <label for="rate-1" style="--i:1"><i class="fa-solid fa-star text-white"></i></label>
                        <input type="radio" name="rating" id="rate-1" value="1">
                        <label for="rate-2" style="--i:2"><i class="fa-solid fa-star text-white"></i></label>
                        <input type="radio" name="rating" id="rate-2" value="2" checked>
                        <label for="rate-3" style="--i:3"><i class="fa-solid fa-star text-white"></i></label>
                        <input type="radio" name="rating" id="rate-3" value="3">
                        <label for="rate-4" style="--i:4"><i class="fa-solid fa-star text-white"></i></label>
                        <input type="radio" name="rating" id="rate-4" value="4">
                        <label for="rate-5" style="--i:5"><i class="fa-solid fa-star text-white"></i></label>
                        <input type="radio" name="rating" id="rate-5" value="5">
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
                    <h1>{{ $movie->title }} </h1>
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
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var id = $("#check").data("id");

            $("#check").click(function() {
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
                        console.log(result);
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
                        console.log(result);

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

        });
    </script>

    <script>
        $(document).ready(function() {
            var id = $(".star-rating").data("id");
            var rating = $('input[name="rating"]:checked').val();

            console.log('ok', id);
            console.log('rating', rating);


            $(".star-rating input").click(function() {
                 rating = $('input[name="rating"]:checked').val();
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
