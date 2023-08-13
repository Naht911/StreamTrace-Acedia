@extends('layouts.home.home_layout')
@section('title', 'Home')
@push('css')
@endpush


@section('content')



     <div class="discovery-recs">
          <div class="container">
               <div class="discovery-recs-left">
                    <div class="title">
                         <h1>Discover daily</h1>
                         <div class="calendar-icon">
                              <div class="calendar-icon__month pt-1">
                                   <span>{{ \Carbon\Carbon::now()->format('M') }}</span>

                              </div>
                              <div class="calendar-icon__date">
                                   <span>{{ \Carbon\Carbon::now()->format('d') }}</span>
                              </div>
                         </div>
                    </div>


               </div>
               <div class="discovery-recs-right">
                    <div class="brand">
                         <div class="brand-item">
                              <i class="fa-solid fa-plus"></i>
                         </div>
                         @foreach($providers->take(3) as $item)
                         <div class="brand-item">
                              <img src="{{$item->logo}}" alt="" />
                         </div>
                         @endforeach
                    </div>
               </div>
          </div>
     </div>



     {{-- <div class="titles">
          <div class="container">
               <div class="title">Just added to your services</div>
               <div class="card-sliders card-sliders-1">
                    <div class="card-slider swiper-wrapper">
                         <div class="card swiper-slide">
                              <div class="image">
                                   <img src="/assets/home/img/guardians-of-the-galaxy-vol-3.webp" alt="" />
                              </div>
                              <div class="hover">
                                   <div class="content">
                                        <a href="chitiet.html" class="info">
                                             <img src="/assets/home/img/icon (1).webp" alt="" />
                                             <span>Watch TV</span>
                                        </a>
                                   </div>
                                   <ul>
                                        <li>
                                             <a><i class="fa-solid fa-bookmark"></i></a>
                                        </li>
                                   </ul>
                              </div>
                         </div>
                         <div class="card swiper-slide">
                              <div class="image">
                                   <img src="/assets/home/img/guardians-of-the-galaxy-vol-3.webp" alt="" />
                              </div>
                              <div class="hover">
                                   <div class="content">
                                        <a href="chitiet.html" class="info">
                                             <img src="/assets/home/img/icon (1).webp" alt="" />
                                             <span>Watch TV</span>
                                        </a>
                                   </div>
                                   <ul>
                                        <li>
                                             <a><i class="fa-solid fa-bookmark"></i></a>
                                        </li>
                                   </ul>
                              </div>
                         </div>
                         <div class="card swiper-slide">
                              <div class="image">
                                   <img src="/assets/home/img/guardians-of-the-galaxy-vol-3.webp" alt="" />
                              </div>
                              <div class="hover">
                                   <div class="content">
                                        <a href="chitiet.html" class="info">
                                             <img src="/assets/home/img/icon (1).webp" alt="" />
                                             <span>Watch TV</span>
                                        </a>
                                   </div>
                                   <ul>
                                        <li>
                                             <a><i class="fa-solid fa-bookmark"></i></a>
                                        </li>
                                   </ul>
                              </div>
                         </div>
                         <div class="card swiper-slide">
                              <div class="image">
                                   <img src="/assets/home/img/guardians-of-the-galaxy-vol-3.webp" alt="" />
                              </div>
                              <div class="hover">
                                   <div class="content">
                                        <a href="chitiet.html" class="info">
                                             <img src="/assets/home/img/icon (1).webp" alt="" />
                                             <span>Watch TV</span>
                                        </a>
                                   </div>
                                   <ul>
                                        <li>
                                             <a><i class="fa-solid fa-bookmark"></i></a>
                                        </li>
                                   </ul>
                              </div>
                         </div>
                         <div class="card swiper-slide">
                              <div class="image">
                                   <img src="/assets/home/img/guardians-of-the-galaxy-vol-3.webp" alt="" />
                              </div>
                              <div class="hover">
                                   <div class="content">
                                        <a href="chitiet.html" class="info">
                                             <img src="/assets/home/img/icon (1).webp" alt="" />
                                             <span>Watch TV</span>
                                        </a>
                                   </div>
                                   <ul>
                                        <li>
                                             <a><i class="fa-solid fa-bookmark"></i></a>
                                        </li>
                                   </ul>
                              </div>
                         </div>
                         <div class="card swiper-slide">
                              <div class="image">
                                   <img src="/assets/home/img/guardians-of-the-galaxy-vol-3.webp" alt="" />
                              </div>
                              <div class="hover">
                                   <div class="content">
                                        <a href="chitiet.html" class="info">
                                             <img src="/assets/home/img/icon (1).webp" alt="" />
                                             <span>Watch TV</span>
                                        </a>
                                   </div>
                                   <ul>
                                        <li>
                                             <a><i class="fa-solid fa-bookmark"></i></a>
                                        </li>
                                   </ul>
                              </div>
                         </div>
                         <div class="card swiper-slide">
                              <div class="image">
                                   <img src="/assets/home/img/guardians-of-the-galaxy-vol-3.webp" alt="" />
                              </div>
                              <div class="hover">
                                   <div class="content">
                                        <a href="chitiet.html" class="info">
                                             <img src="/assets/home/img/icon (1).webp" alt="" />
                                             <span>Watch TV</span>
                                        </a>
                                   </div>
                                   <ul>
                                        <li>
                                             <a><i class="fa-solid fa-bookmark"></i></a>
                                        </li>
                                   </ul>
                              </div>
                         </div>
                         <div class="card swiper-slide">
                              <div class="image">
                                   <img src="/assets/home/img/guardians-of-the-galaxy-vol-3.webp" alt="" />
                              </div>
                              <div class="hover">
                                   <div class="content">
                                        <a href="chitiet.html" class="info">
                                             <img src="/assets/home/img/icon (1).webp" alt="" />
                                             <span>Watch TV</span>
                                        </a>
                                   </div>
                                   <ul>
                                        <li>
                                             <a><i class="fa-solid fa-bookmark"></i></a>
                                        </li>
                                   </ul>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div> --}}

     <div class="titles">
          <div class="container">
               <div class="title">Top 10 in 🇺🇸 today</div>
               <div class="card-sliders card-sliders-2">
                    <div class="card-slider swiper-wrapper">
                         @foreach ($top_ten as $item)
                              <div class="card-rating swiper-slide">
                                   <div class="image">
                                        <div class="number">
                                             {{ $loop->iteration }}
                                        </div>
                                        <a href="{{ route('home.movie.movie_detail', $item->id) }}">
                                             <img src="{{ asset($item->poster_url) }}" alt="" height="240" width="165" />
                                             <div class="hover">
                                                  <div class="content">
                                                       <button class="info">
                                                            <img src="/assets/home/img/icon (1).webp" alt="" />
                                                            <span>Watch Now</span>
                                                       </button>
                                                  </div>
                                                  <ul>
                                                       <li>
                                                            <a><i class="fa-solid fa-bookmark"></i></a>
                                                       </li>
                                                  </ul>
                                             </div>
                                        </a>
                                   </div>
                              </div>
                         @endforeach


                    </div>
               </div>
          </div>
     </div>

     <div class="titles">
          <div class="container">
               <div class="title">What New?</div>
               <div class="card-sliders card-sliders-1">
                    <div class="card-slider swiper-wrapper">
                         @foreach ($new_ten as $item)
                              <div class="card swiper-slide">
                                   <div class="image">
                                        <a href="{{ route('home.movie.movie_detail', $item->id) }}">
                                             <img src="{{ asset($item->poster_url) }}" alt="" height="240" width="165" />
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
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
               </div>
          </div>
     </div>
     <div class="stream-chart">
          <div class="container">
               <h2>Today's streaming charts</h2>
               <div class="brand">
                    <div class="brand-item">
                         <a href="" class="top">
                              <img src="{{$primeVideo->logo}}" alt="" />
                              <div class="title">Prime Video</div>
                         </a>
                         @foreach($newest_primeVideo as $key => $prime)
                         <div class="center">
                              <div class="item">
                                   <div class="number">{{$key+1}}</div>
                                   <div class="image">
                                        <img src="{{asset($prime->poster_url)}}" alt="" />
                                   </div>
                                   <div class="title-movie">
                                        <h3>{{$prime->title}}</h3>
                                        <p>{{$prime->duration}}</p>
                                   </div>
                                   <div class="up-down">
                                        <i class="fa-solid fa-sort-up"></i>
                                   </div>
                              </div>
                         </div>
                         @endforeach
                         
                    </div>
                    <div class="brand-item">
                         <a href="" class="top">
                              <img src="{{$netflix->logo}}" alt="" />
                              <div class="title">Netflix</div>
                         </a>
                         @foreach($newest_netflix as $key => $prime)
                         <div class="center">
                              <div class="item">
                                   <div class="number">{{$key+1}}</div>
                                   <div class="image">
                                        <img src="{{asset($prime->poster_url)}}" alt="" />
                                   </div>
                                   <div class="title-movie">
                                        <h3>{{$prime->title}}</h3>
                                        <p>{{$prime->duration}}</p>
                                   </div>
                                   <div class="up-down">
                                        <i class="fa-solid fa-sort-up"></i>
                                   </div>
                              </div>
                         </div>
                         @endforeach
                    </div>
                    <div class="brand-item">
                         <a href="" class="top">
                              <img src="{{$appleTV->logo}}" alt="" />
                              <div class="title">Netflix</div>
                         </a>
                         @foreach($newest_appleTV as $key => $prime)
                         <div class="center">
                              <div class="item">
                                   <div class="number">{{$key+1}}</div>
                                   <div class="image">
                                        <img src="{{asset($prime->poster_url)}}" alt="" />
                                   </div>
                                   <div class="title-movie">
                                        <h3>{{$prime->title}}</h3>
                                        <p>{{$prime->duration}}</p>
                                   </div>
                                   <div class="up-down">
                                        <i class="fa-solid fa-sort-up"></i>
                                   </div>
                              </div>
                         </div>
                         @endforeach
                    </div>

               </div>
          </div>
     </div>
     <div class="titles">
          <div class="container">
               <div class="title">Just added to your watched</div>
               <div class="card-sliders card-sliders-1">
                    <div class="card-slider swiper-wrapper">
                         @foreach ($new_ten as $item)
                              <div class="card swiper-slide">
                                   <div class="image">
                                        <img src="{{ asset($item->poster_url) }}" alt="" />
                                   </div>
                                   <div class="hover">
                                        <div class="content">
                                             <a href="chitiet.html" class="info">
                                                  <img src="img/icon (1).webp" alt="" />
                                                  <span>Watch TV</span>
                                             </a>
                                        </div>
                                        <ul>
                                             <li>
                                                  <a class="book"><i class="fa-solid fa-bookmark"></i></a>
                                             </li>
                                        </ul>
                                   </div>
                              </div>
                         @endforeach

                         <div class="card swiper-slide">
                              <div class="image">
                                   <img src="img/guardians-of-the-galaxy-vol-3.webp" alt="" />
                              </div>
                              <div class="hover">
                                   <div class="content">
                                        <a href="chitiet.html" class="info">
                                             <img src="img/icon (1).webp" alt="" />
                                             <span>Watch TV</span>
                                        </a>
                                   </div>
                                   <ul>
                                        <li>
                                             <a class="book"><i class="fa-solid fa-bookmark"></i></a>
                                        </li>
                                   </ul>
                              </div>
                         </div>
                         <div class="card swiper-slide">
                              <div class="image">
                                   <img src="img/guardians-of-the-galaxy-vol-3.webp" alt="" />
                              </div>
                              <div class="hover">
                                   <div class="content">
                                        <a href="chitiet.html" class="info">
                                             <img src="img/icon (1).webp" alt="" />
                                             <span>Watch TV</span>
                                        </a>
                                   </div>
                                   <ul>
                                        <li>
                                             <a class="book"><i class="fa-solid fa-bookmark"></i></a>
                                        </li>
                                   </ul>
                              </div>
                         </div>
                         <div class="card swiper-slide">
                              <div class="image">
                                   <img src="img/guardians-of-the-galaxy-vol-3.webp" alt="" />
                              </div>
                              <div class="hover">
                                   <div class="content">
                                        <a href="chitiet.html" class="info">
                                             <img src="img/icon (1).webp" alt="" />
                                             <span>Watch TV</span>
                                        </a>
                                   </div>
                                   <ul>
                                        <li>
                                             <a class="book"><i class="fa-solid fa-bookmark"></i></a>
                                        </li>
                                   </ul>
                              </div>
                         </div>
                         <div class="card swiper-slide">
                              <div class="image">
                                   <img src="img/guardians-of-the-galaxy-vol-3.webp" alt="" />
                              </div>
                              <div class="hover">
                                   <div class="content">
                                        <a href="chitiet.html" class="info">
                                             <img src="img/icon (1).webp" alt="" />
                                             <span>Watch TV</span>
                                        </a>
                                   </div>
                                   <ul>
                                        <li>
                                             <a class="book"><i class="fa-solid fa-bookmark"></i></a>
                                        </li>
                                   </ul>
                              </div>
                         </div>
                         <div class="card swiper-slide">
                              <div class="image">
                                   <img src="img/guardians-of-the-galaxy-vol-3.webp" alt="" />
                              </div>
                              <div class="hover">
                                   <div class="content">
                                        <a href="chitiet.html" class="info">
                                             <img src="img/icon (1).webp" alt="" />
                                             <span>Watch TV</span>
                                        </a>
                                   </div>
                                   <ul>
                                        <li>
                                             <a class="book"><i class="fa-solid fa-bookmark"></i></a>
                                        </li>
                                   </ul>
                              </div>
                         </div>
                         <div class="card swiper-slide">
                              <div class="image">
                                   <img src="img/guardians-of-the-galaxy-vol-3.webp" alt="" />
                              </div>
                              <div class="hover">
                                   <div class="content">
                                        <a href="chitiet.html" class="info">
                                             <img src="img/icon (1).webp" alt="" />
                                             <span>Watch TV</span>
                                        </a>
                                   </div>
                                   <ul>
                                        <li>
                                             <a class="book"><i class="fa-solid fa-bookmark"></i></a>
                                        </li>
                                   </ul>
                              </div>
                         </div>
                         <div class="card swiper-slide">
                              <div class="image">
                                   <img src="img/guardians-of-the-galaxy-vol-3.webp" alt="" />
                              </div>
                              <div class="hover">
                                   <div class="content">
                                        <a href="chitiet.html" class="info">
                                             <img src="img/icon (1).webp" alt="" />
                                             <span>Watch TV</span>
                                        </a>
                                   </div>
                                   <ul>
                                        <li>
                                             <a class="book"><i class="fa-solid fa-bookmark"></i></a>
                                        </li>
                                   </ul>
                              </div>
                         </div>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
               </div>
          </div>
     </div>
     <div class="titles titles-2">
          <div class="container">
               <div class="title">
                    <h2>Top 10 TV shows this week</h2>
                    <p>Explore this week’s most popular TV shows and find out where to stream them.</p>
               </div>
               <div class="card-sliders card-sliders-2">
                    <div class="card-slider swiper-wrapper">
                         @foreach ($new_ten as $item)
                              <div class="card-rating swiper-slide">
                                   <div class="image">
                                        <div class="number">1</div>
                                        <img src="/assets/home/img/guardians-of-the-galaxy-vol-3.webp" alt="" />
                                        <div class="hover">
                                             <div class="content">
                                                  <button class="info">
                                                       <img src="/assets/home/img/icon (1).webp" alt="" />
                                                       <span>Watch TV</span>
                                                  </button>
                                             </div>
                                             <ul>
                                                  <li>
                                                       <a><i class="fa-solid fa-bookmark"></i></a>
                                                  </li>
                                             </ul>
                                        </div>
                                   </div>
                              </div>
                         @endforeach

                         <div class="card-rating swiper-slide">
                              <div class="image">
                                   <div class="number">2</div>
                                   <img src="/assets/home/img/guardians-of-the-galaxy-vol-3.webp" alt="" />
                                   <div class="hover">
                                        <div class="content">
                                             <button class="info">
                                                  <img src="/assets/home/img/icon (1).webp" alt="" />
                                                  <span>Watch TV</span>
                                             </button>
                                        </div>
                                        <ul>
                                             <li>
                                                  <a><i class="fa-solid fa-bookmark"></i></a>
                                             </li>
                                        </ul>
                                   </div>
                              </div>
                         </div>
                         <div class="card-rating swiper-slide">
                              <div class="image">
                                   <div class="number">3</div>
                                   <img src="/assets/home/img/guardians-of-the-galaxy-vol-3.webp" alt="" />
                                   <div class="hover">
                                        <div class="content">
                                             <button class="info">
                                                  <img src="/assets/home/img/icon (1).webp" alt="" />
                                                  <span>Watch TV</span>
                                             </button>
                                        </div>
                                        <ul>
                                             <li>
                                                  <a><i class="fa-solid fa-bookmark"></i></a>
                                             </li>
                                        </ul>
                                   </div>
                              </div>
                         </div>
                         <div class="card-rating swiper-slide">
                              <div class="image">
                                   <div class="number">3</div>
                                   <img src="/assets/home/img/guardians-of-the-galaxy-vol-3.webp" alt="" />
                                   <div class="hover">
                                        <div class="content">
                                             <button class="info">
                                                  <img src="/assets/home/img/icon (1).webp" alt="" />
                                                  <span>Watch TV</span>
                                             </button>
                                        </div>
                                        <ul>
                                             <li>
                                                  <a><i class="fa-solid fa-bookmark"></i></a>
                                             </li>
                                        </ul>
                                   </div>
                              </div>
                         </div>
                         <div class="card-rating swiper-slide">
                              <div class="image">
                                   <div class="number">3</div>
                                   <img src="/assets/home/img/guardians-of-the-galaxy-vol-3.webp" alt="" />
                                   <div class="hover">
                                        <div class="content">
                                             <button class="info">
                                                  <img src="/assets/home/img/icon (1).webp" alt="" />
                                                  <span>Watch TV</span>
                                             </button>
                                        </div>
                                        <ul>
                                             <li>
                                                  <a><i class="fa-solid fa-bookmark"></i></a>
                                             </li>
                                        </ul>
                                   </div>
                              </div>
                         </div>
                         <div class="card-rating swiper-slide">
                              <div class="image">
                                   <div class="number">3</div>
                                   <img src="/assets/home/img/guardians-of-the-galaxy-vol-3.webp" alt="" />
                                   <div class="hover">
                                        <div class="content">
                                             <button class="info">
                                                  <img src="/assets/home/img/icon (1).webp" alt="" />
                                                  <span>Watch TV</span>
                                             </button>
                                        </div>
                                        <ul>
                                             <li>
                                                  <a><i class="fa-solid fa-bookmark"></i></a>
                                             </li>
                                        </ul>
                                   </div>
                              </div>
                         </div>
                         <div class="card-rating swiper-slide">
                              <div class="image">
                                   <div class="number">3</div>
                                   <img src="/assets/home/img/guardians-of-the-galaxy-vol-3.webp" alt="" />
                                   <div class="hover">
                                        <div class="content">
                                             <button class="info">
                                                  <img src="/assets/home/img/icon (1).webp" alt="" />
                                                  <span>Watch TV</span>
                                             </button>
                                        </div>
                                        <ul>
                                             <li>
                                                  <a><i class="fa-solid fa-bookmark"></i></a>
                                             </li>
                                        </ul>
                                   </div>
                              </div>
                         </div>
                         <div class="card-rating swiper-slide">
                              <div class="image">
                                   <div class="number">3</div>
                                   <img src="/assets/home/img/guardians-of-the-galaxy-vol-3.webp" alt="" />
                                   <div class="hover">
                                        <div class="content">
                                             <button class="info">
                                                  <img src="/assets/home/img/icon (1).webp" alt="" />
                                                  <span>Watch TV</span>
                                             </button>
                                        </div>
                                        <ul>
                                             <li>
                                                  <a><i class="fa-solid fa-bookmark"></i></a>
                                             </li>
                                        </ul>
                                   </div>
                              </div>
                         </div>
                         <div class="card-rating swiper-slide">
                              <div class="image">
                                   <div class="number">9</div>
                                   <img src="/assets/home/img/guardians-of-the-galaxy-vol-3.webp" alt="" />
                                   <div class="hover">
                                        <div class="content">
                                             <button class="info">
                                                  <img src="/assets/home/img/icon (1).webp" alt="" />
                                                  <span>Watch TV</span>
                                             </button>
                                        </div>
                                        <ul>
                                             <li>
                                                  <a><i class="fa-solid fa-bookmark"></i></a>
                                             </li>
                                        </ul>
                                   </div>
                              </div>
                         </div>
                         <div class="card-rating swiper-slide">
                              <div class="image">
                                   <div class="number">10</div>
                                   <img src="/assets/home/img/guardians-of-the-galaxy-vol-3.webp" alt="" />
                                   <div class="hover">
                                        <div class="content">
                                             <button class="info">
                                                  <img src="/assets/home/img/icon (1).webp" alt="" />
                                                  <span>Watch TV</span>
                                             </button>
                                        </div>
                                        <ul>
                                             <li>
                                                  <a><i class="fa-solid fa-bookmark"></i></a>
                                             </li>
                                        </ul>
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
