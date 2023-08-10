@extends('layouts.dashboard.dashboard_layout')
@section('title', 'Lisy Movie')



@push('css')
@endpush
@section('content')
     @yield('breadcrumb-list')

     <div class="container-fluid dashboard-default-sec">
          <div class="row">

               <div class="col-xl-12 box-col-12 des-xl-100 top-dealer-sec">
                    <div class="card">
                         <div class="card-header pb-0">
                              <div class="text-center">
                                   <h4> List Movie </h4>
                              </div>
                              <hr>
                              <h6 class="text-center mb-3">
                                   Search
                              </h6>
                              <form action="{{ route('dashboard.movie.list_movie') }}" method="get">
                                   <div class="row">
                                        <div class="col-sm-6 col-12">
                                             <div class="mb-3 m-form__group">
                                                  <div class="input-group">
                                                       <span class="input-group-text">Provider</span>
                                                       <select class="form-control" name="provider" id="provider">
                                                            <option value="">Select Provider</option>
                                                            @foreach ($providers as $provider)
                                                                 <option value="{{ $provider->name }}" {{ request()->query('provider') == $provider->name ? 'selected' : '' }}>{{ $provider->name }}</option>
                                                            @endforeach
                                                       </select>
                                                  </div>
                                             </div>
                                        </div>
                                        <div class="col-sm-6 col-12">
                                             <div class="mb-3 m-form__group">
                                                  <div class="input-group">
                                                       <span class="input-group-text">Genres</span>
                                                       <select class="form-control" name="genre" id="genre">
                                                            <option value="">Select Genre</option>
                                                            @foreach ($genres as $genre)
                                                                 <option value="{{ $genre->slug }}" {{ request()->query('genre') == $genre->slug ? 'selected' : '' }}>{{ $genre->name }}</option>
                                                            @endforeach
                                                       </select>
                                                  </div>
                                             </div>
                                        </div>
                                        <div class="col-sm-6 col-12">
                                             <div class="mb-3 m-form__group">
                                                  <div class="input-group">
                                                       <span class="input-group-text">Name</span>
                                                       <input type="text" class="form-control" name="name" id="name" value="{{ request()->query('name') }}">
                                                  </div>
                                             </div>
                                        </div>
                                        <div class="col-sm-6 col-12">
                                             <div class="mb-3 m-form__group">
                                                  <input type="submit" class="btn btn-secondary" value="Search">
                                                  <a href="{{ route('dashboard.movie.list_movie') }}" class="btn btn-danger">Clear</a>
                                             </div>
                                        </div>
                                   </div>
                              </form>
                         </div>


                         <div class="card-body">

                              <p> Filter :
                                   @foreach (request()->query() as $key => $q)
                                        @if ($key == 'provider' && $q != null)
                                             <a href="{{ route('dashboard.movie.list_movie', revomeParam('provider')) }}">
                                                  <span class="badge badge-sm badge-warning">
                                                       {{ $q }} <i class="fa-solid fa-circle-xmark"></i>
                                                  </span>
                                             </a>
                                        @endif
                                        @if ($key == 'genre' && $q != null)
                                             <a href="{{ route('dashboard.movie.list_movie', revomeParam('genre')) }}">
                                                  <span class="badge badge-sm badge-primary">
                                                       {{ $q }} <i class="fa-solid fa-circle-xmark"></i>
                                                  </span>
                                             </a>
                                        @endif
                                        @if ($key == 'name' && $q != null)
                                             <a href="{{ route('dashboard.movie.list_movie', revomeParam('name')) }}">
                                                  <span class="badge badge-sm badge-dark">
                                                       name: {{ $q }} <i class="fa-solid fa-circle-xmark"></i>
                                                  </span>
                                             </a>
                                        @endif
                                   @endforeach
                                   {{-- clear btn --}}
                                   @if (checkParam())
                                        <a href="{{ route('dashboard.movie.list_movie') }}">
                                             <span class="badge badge-sm badge-danger">
                                                  Clear All <i class="fa-solid fa-circle-xmark"></i>
                                             </span>
                                        </a>
                                   @else
                                        <span class="badge badge-sm badge-info">
                                             No Filter
                                        </span>
                                   @endif
                              </p>

                              <table class="table table-bordered">
                                   <thead>
                                        <tr>
                                             <th scope="col">#</th>
                                             <th scope="col">Title</th>
                                             <th scope="col">Genres</th>
                                             <th scope="col">Providers</th>
                                             <th scope="col">Action</th>
                                        </tr>
                                   </thead>
                                   <tbody>
                                        @if ($movies->isEmpty())
                                             <tr>
                                                  <td colspan="5" class="text-center">No Data</td>
                                             </tr>
                                        @else
                                             @foreach ($movies as $movie)
                                                  <tr>
                                                       <th scope="row">{{ $movie->id }}</th>
                                                       <td>{{ $movie->title }}</td>
                                                       <td>
                                                            @if ($movie->genres != null)
                                                                 @foreach ($movie->genres as $genre)
                                                                      <a href="{{ route('dashboard.movie.list_movie', addParam('genre', $genre->slug)) }}">
                                                                           <span class="badge badge-sm badge-primary">
                                                                                {{ $genre->name }}
                                                                           </span>
                                                                      </a>
                                                                 @endforeach
                                                            @endif
                                                       </td>
                                                       <td>

                                                            @if ($movie->providers != null)
                                                                 @foreach ($movie->providers_distinct as $provider)
                                                                      <a href="{{ route('dashboard.movie.list_movie', addParam('provider', $provider->name)) }}">
                                                                           <span class="badge badge-sm badge-warning">
                                                                                {{ $provider->name }}
                                                                           </span>
                                                                      </a>
                                                                 @endforeach
                                                            @endif
                                                       </td>

                                                       <td>
                                                            <a href="{{ route('dashboard.movie.edit_movie', $movie->id) }}"
                                                                class="btn btn-primary">Edit</a>
                                                         {{-- <a href="{{ route('movie.delete', $movie->id) }}"
                                                                class="btn btn-danger">Delete</a> --}}
                                                       </td>
                                                  </tr>
                                             @endforeach
                                        @endif
                                   </tbody>
                              </table>

                         </div>

                         <div class="card-footer text-end">
                              {{ $movies->links() }}
                              <a href="{{ route('dashboard') }}" class="btn btn-danger">Back to Dashboard</a>
                         </div>

                    </div>
               </div>


          </div>
     </div>




@endsection

<!-- Container-fluid Ends-->
@push('scripts')
@endpush
