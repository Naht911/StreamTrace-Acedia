@extends('layouts.home.home_layout')
@section('title', 'My Watchlist')
@push('css')
     <style>
          .card-custom {
               height: 240px;
               width: 210px;
          }

          .card {
               border: none;
               background: none;
          }

          .card-header-custom {
               border: none;
               border-bottom: none;
          }

          .card-footer-custom {
               border: none;
               border-top: none;
          }

          .btn-warning-custom {
               background-color: #ddad00;
               border-color: #ddad00;
               color: white;
          }

          .btn-gray {
               background-color: #4c5a67;
               border-color: #4c5a67;
               color: white;
          }

          .card-body-custom {
               padding-top: 5px !important;
          }

          .release_year {
               font-size: 1.2rem;
               color: #ddad00;
               font-style: initial;
          }

          .sort .top a.active {
               border: 1px solid #1c252f;
               border-radius: 5px;
               background: #1c252f;
          }

          .sort .top a {
               height: 100%;
               display: inline-flex;
               align-items: center;
               gap: 0.4rem;
               color: #fff;
               border: 1px solid transparent;
               padding: 10px 10px;
               font-size: 14px;
               font-weight: 400;
          }

          .btn-warning-custom:hover {
               background-color: #ddad00be;
               color: #ffffff;
          }

          .btn-gray:hover {
               background-color: #4c5a67be;
               color: #ffffff;
          }

          .btn-warning-custom:focus {
               outline: none;
               border: :none;
               box-shadow: none;
               background-color: #ddad00be;
               color: #ffffff;

          }

          .btn-gray:focus {
               outline: none;
               border: :none;
               box-shadow: none;
               background-color: #4c5a67be;
               color: #ffffff;

          }
     </style>
@endpush


@section('content')


     <div class="discovery-recs mt-5">
          <div class="container">
               <div class="discovery-recs-left">
                    <div class="title">
                         <h1>
                              A place to save your watchlist
                         </h1>
                    </div>
               </div>
          </div>
     </div>

     @auth

          <div class="sort sort-watchlist">
               <div class="container">
                    <div class="top">
                         <a class="{{ request()->query('reaction') == 'tracked' || request()->query('reaction') == null ? 'active' : null }}" href="{{ route('home.wathchlist', ['reaction' => 'tracked']) }}">
                              <i class="fa-solid fa-bookmark"></i>
                              Watch next ({{ $count_tracked }})
                         </a>
                         <a class="{{ request()->query('reaction') == 'watched' ? 'active' : null }}" href="{{ route('home.wathchlist', ['reaction' => 'watched']) }}">
                              <i class="fa-solid fa-check"></i>
                              Watched ({{ $count_watched }})
                         </a>
                         <a class="{{ request()->query('reaction') == 'thunbs_up' ? 'active' : null }}" href="{{ route('home.wathchlist', ['reaction' => 'thunbs_up']) }}">
                              <i class="fa-solid fa-thumbs-up"></i>
                              Liked ({{ $count_thumbs_up }})
                         </a>
                         <a class="{{ request()->query('reaction') == 'thunbs_down' ? 'active' : null }}" href="{{ route('home.wathchlist', ['reaction' => 'thunbs_down']) }}">
                              <i class="fa-solid fa-thumbs-down"></i>
                              Disliked ({{ $count_thumbs_down }})
                         </a>
                    </div>
                    <div class="bottom">{{ $wathchlist->count() }} title</div>
               </div>
          </div>

          <div class="titles">
               <div class="container">
                    <div class="row gx-5">
                         @if ($wathchlist->isEmpty())
                              <div class="col-md-12 col-12 mt-3 rounded">
                                   <div class="row bg-dark">
                                        <div class="col-12 ">
                                             <div class="card text-white-50">
                                                  <div class="card-header card-header-custom">
                                                       <h3>The list is empty</h3>

                                                  </div>
                                                  <div class="card-body">
                                                       <p>There are no movies in this list. Add some!</p>
                                                  </div>
                                                  <div class="card-footer card-footer-custom d-flex justify-content-between gx-3">

                                                       <div class="btn-group w-100" role="group" aria-label="Basic mixed styles form-control">
                                                            <a href="" class="btn btn-warning-custom form-control">Discover</a>
                                                       </div>
                                                  </div>
                                             </div>
                                        </div>
                                   </div>

                              </div>
                         @endif
                         @foreach ($wathchlist as $i)
                              <div class="col-md-6 col-12 mt-3 rounded">
                                   <div class="row bg-dark">
                                        <div class="col-4 ">
                                             <img src="{{ asset($i->movie->poster_url) }}"class="h-100 p-0" width="190">
                                        </div>
                                        <div class="col-8 ">
                                             <div class="card text-white-50">
                                                  <div class="card-header card-header-custom">
                                                       <h3>{{ $i->movie->title }} <span class="release_year">({{ $i->movie->release_year }})</span></h3>

                                                  </div>
                                                  <div class="card-body">
                                                       <p>{{ limitWord($i->movie->synopsis, 100) }}</p>
                                                  </div>
                                                  <div class="card-footer card-footer-custom">
                                                       <div class=" d-flex justify-content-between gx-3"></div>
                                                       <div class="btn-group w-100" role="group" aria-label="Basic mixed styles form-control">
                                                            @if ($i->is_tracked == 1)
                                                                 <button name="reaction" data-id="{{ $i->movie->id }}" data-act="tracked" class="btn btn-warning-custom form-control" title="Untrack">
                                                                      <i class="fa-solid fa-bookmark"></i>
                                                                 </button>
                                                            @else
                                                                 <button name="reaction" data-id="{{ $i->movie->id }}" data-act="tracked" class="btn btn-gray form-control" title="Track">
                                                                      <i class="fa-solid fa-bookmark"></i>
                                                                 </button>
                                                            @endif
                                                            @if ($i->is_watched == 0)
                                                                 <button name="reaction" data-id="{{ $i->movie->id }}" data-act="watched" class="btn btn-gray form-control" title="Watched">
                                                                      <i class="fa-solid fa-check-double"></i>
                                                                 </button>
                                                            @else
                                                                 <button name="reaction" data-id="{{ $i->movie->id }}" data-act="watched" class="btn btn-warning-custom form-control" title="Unwatched">
                                                                      <i class="fa-solid fa-check-double"></i>
                                                                 </button>
                                                            @endif

                                                            @if ($i->is_thumbs_up == 1)
                                                                 <button name="reaction" data-id="{{ $i->movie->id }}" data-act="thumbs_up" class="btn btn-warning-custom form-control" title="Dislike">
                                                                      <i class="fa-solid fa-thumbs-up"></i>
                                                                 </button>
                                                            @else
                                                                 <button name="reaction" data-id="{{ $i->movie->id }}" data-act="thumbs_up" class="btn btn-gray form-control" title="Like">
                                                                      <i class="fa-solid fa-thumbs-up"></i>
                                                                 </button>
                                                            @endif

                                                            @if ($i->is_thumbs_down == 1)
                                                                 <button name="reaction" data-id="{{ $i->movie->id }}" data-act="thumbs_down" class="btn btn-warning-custom form-control" title="Undislike">
                                                                      <i class="fa-solid fa-thumbs-down"></i>
                                                                 </button>
                                                            @else
                                                                 <button name="reaction" data-id="{{ $i->movie->id }}" data-act="thumbs_down" class="btn btn-gray form-control" title="Dislike">
                                                                      <i class="fa-solid fa-thumbs-down"></i>
                                                                 </button>
                                                            @endif
                                                       </div>
                                                  </div>
                                                  <hr>

                                                  <a href="{{ route('home.movie.movie_detail', $i->movie->id) }}" class="btn btn-warning-custom form-control">
                                                       <i class="fa-solid fa-play"></i>

                                                  </a>
                                             </div>
                                        </div>
                                   </div>


                              </div>
                         @endforeach

                         <div class="row mt-5">
                              {{ $wathchlist->links('home.components.watchlist_pagination') }}
                         </div>

                    </div>
               </div>
          </div>
     @endauth
     @guest
          <div class="titles mt-5">
               <div class="container">
                    <div class="row gx-5">
                         <div class="col-md-12 col-12 mt-3 rounded">
                              <div class="row bg-dark">
                                   <div class="col-12 ">
                                        <div class="card text-white-50">
                                             <div class="card-header card-header-custom">
                                                  <h3 class="text-center">
                                                       Authentication required
                                                  </h3>

                                             </div>
                                             <div class="card-body">
                                                  <p class="text-center">
                                                       You need to be logged in to access this page.
                                                  </p>
                                             </div>
                                             <div class="card-footer card-footer-custom d-flex justify-content-between gx-3 text-center">

                                                  <div class="btn-group w-100" role="group" aria-label="Basic mixed styles form-control">
                                                       <a href="{{ route('login') }}" class="btn btn-warning-custom form-control">
                                                            <i class="fa-solid fa-user"></i>
                                                            Login
                                                       </a>

                                                       <a href="{{ route('register') }}" class="btn btn-gray form-control">
                                                            <i class="fa-solid fa-user-plus"></i>
                                                            Register
                                                       </a>
                                                  </div>
                                             </div>
                                        </div>
                                   </div>
                              </div>

                         </div>
                    </div>
               </div>
          @endguest



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
                    console.log('id');
                    $("button[name='reaction']").click(function() {

                         id = $(this).data("id");
                         act = $(this).data("act");
                         console.log(`id: ${id} act: ${act}`);

                         $.ajax({
                              url: "{{ route('home.movie.handle_reaction') }}",
                              method: 'POST',
                              dataType: "json",
                              data: {
                                   id: id,
                                   act: act,
                                   _token: '{{ csrf_token() }}'
                              },
                              success: function(result) {
                                   //reload the page
                                   location.reload();
                              },
                              error: function(e) {
                                   console.log(e)
                              }
                         });
                    });
               });
          </script>
     @endpush
