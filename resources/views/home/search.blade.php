@extends('layouts.home.home_layout')
@section('title', 'New')
@push('css')
@endpush


@section('content')

{{-- Provider logo --}}
{{-- <div class="discovery-recs discovery-recs-2">
    <div class="container">
        <div class="discovery-recs-right">
            <div class="brand">
                <div class="brand-item">
                    <i class="fa-solid fa-plus"></i>
                </div>
                @foreach($providers as $provider)
                <div class="brand-item">
                    <img src="{{asset($provider->logo)}}" alt="" />
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div> --}}

{{-- Filter --}}
<div class="sort sort-popular">
    <div class="container">
        <div class="filterBtn">
            <i class="fa-solid fa-filter"></i>
        </div>
        <div class="top list-top">
            <a class="filter-done">
                <div>
                    <div class="list-all">
                        <div class="top">
                            <div class="title">Filters</div>
                            <div class="reset done">
                                <i class="fa-solid fa-check"></i>
                                Done
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <a>
                <div class="yearBtn">
                    <div class="title-popular">
                        Release year
                        <i class="fa-solid fa-sort-down"></i>
                    </div>
                    <div class="list-all list-year">
                        <div class="top">
                            <div class="title">Release year</div>
                            <div class="reset" onclick="resetSlider()">
                                <i class="fa-solid fa-xmark"></i>
                                <p>RESET</p>
                            </div>
                        </div>
                        <div class="center">
                            <div class="range">
                                <p><span id="demo"></span></p>
                                <label for="">1900</label>
                                <input
                                    type="range"
                                    min="1900"
                                    max="2023"
                                    value="2023"
                                    class="slider"
                                    id="myRange"
                                />
                                <label for="">2023</label>
                            </div>
                            <div class="list">
                                <div class="item">
                                    <i class="fa-solid fa-check"></i>
                                    This Year
                                </div>
                                <div class="item">
                                    <i class="fa-solid fa-check"></i>
                                    Last Year
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <a>
                <div class="genreBtn">
                    <div class="title-popular">
                        Genre
                        <i class="fa-solid fa-sort-down"></i>
                    </div>
                    <div class="list-all list-genre">
                        <div class="top">
                            <div class="title">Genres</div>
                            <div class="reset">
                                <i class="fa-solid fa-xmark"></i>
                                <p>RESET</p>
                            </div>
                        </div>
                        <div class="center">
                            <div class="list">
                                <div class="item">
                                    <i class="fa-solid fa-check"></i>
                                    Action & Adventure
                                </div>
                                <div class="item">
                                    <i class="fa-solid fa-check"></i>
                                    Animation
                                </div>
                                <div class="item">
                                    <i class="fa-solid fa-check"></i>
                                    Action & Adventure
                                </div>
                                <div class="item">
                                    <i class="fa-solid fa-check"></i>
                                    Animation
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <a>
                <div class="priceBtn">
                    <div class="title-popular">
                        Price
                        <i class="fa-solid fa-sort-down"></i>
                    </div>
                    <div class="list-all list-price">
                        <div class="top">
                            <div class="title">Types</div>
                            <div class="reset reset-price">
                                <i class="fa-solid fa-xmark"></i>
                                <p>RESET</p>
                            </div>
                        </div>
                        <div class="center">
                            <div class="list list-prices">
                                <div class="item">
                                    <i class="fa-solid fa-check"></i>
                                    Free
                                </div>
                                <div class="item">
                                    <i class="fa-solid fa-check"></i>
                                    Ads
                                </div>
                                <div class="item">
                                    <i class="fa-solid fa-check"></i>
                                    Subscription
                                </div>
                                <div class="item">
                                    <i class="fa-solid fa-check"></i>
                                    Buy
                                </div>
                                <div class="item">
                                    <i class="fa-solid fa-check"></i>
                                    Rent
                                </div>
                            </div>
                        </div>
                        <div class="top">
                            <div class="title">Quality</div>
                            <div class="reset reset-quality">
                                <i class="fa-solid fa-xmark"></i>
                                <p>RESET</p>
                            </div>
                        </div>
                        <div class="center">
                            <div class="list list-qualities">
                                <div class="item">
                                    <i class="fa-solid fa-check"></i>
                                    SD
                                </div>
                                <div class="item">
                                    <i class="fa-solid fa-check"></i>
                                    HD
                                </div>
                                <div class="item">
                                    <i class="fa-solid fa-check"></i>
                                    4K
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <a>
                <div class="countryBtn">
                    <div class="title-popular">
                        Production country
                        <i class="fa-solid fa-sort-down"></i>
                    </div>
                    <div class="list-all list-country">
                        <div class="top">
                            <div class="title">Production country</div>
                            <div class="reset">
                                <i class="fa-solid fa-xmark"></i>
                                <p>RESET</p>
                            </div>
                        </div>
                        <div class="center">
                            <div class="list">
                                <div class="item">
                                    <i class="fa-solid fa-check"></i>
                                    United States
                                </div>
                                <div class="item">
                                    <i class="fa-solid fa-check"></i>
                                    United States
                                </div>
                                <div class="item">
                                    <i class="fa-solid fa-check"></i>
                                    United States
                                </div>
                                <div class="item">
                                    <i class="fa-solid fa-check"></i>
                                    United States
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="bottom">21540 titles</div>
    </div>
</div>

{{-- Page content --}}
<div class="titles">
    <div class="container">
         <div class="title">Result search for "{{$search}}":</div>
         <div class="card-sliders card-sliders-1">
              <div class="card-slider swiper-wrapper">

                   @foreach ($movies as $item)
                        <div class="card swiper-slide">
                          <div class="image">
                              <a href="{{ route('home.movie.movie_detail', $item->id) }}">
                               <img src="{{ asset($item->poster_url) }}" alt="" height="240" width="165"  />
                              </a>
                          </div>
                          <div class="hover">
                               <div class="content">
                                    <a href="chitiet.html" class="info">
                                         <img src="/assets/home/img/icon (1).webp" alt="" />
                                         <span>Watch Now</span>
                                    </a>
                               </div>
                               <ul>
                                    <li>
                                         <a><i class="fa-solid fa-bookmark"></i></a>
                                    </li>
                               </ul>
                          </div>
                     </div>
                   @endforeach

              </div>
         </div>
    </div>
</div>




@endsection

<!-- Container-fluid Ends-->
@push('scripts')
@endpush
