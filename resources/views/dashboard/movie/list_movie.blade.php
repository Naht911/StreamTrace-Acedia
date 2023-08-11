@extends('layouts.dashboard.dashboard_layout')
@section('title', 'List Movie')



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

                                                  @if ($soft_data != null)
                                                       <a href="{{ route('dashboard.movie.list_movie', addParam('soft', $soft_data->reverse_slug)) }}" class="btn btn-success">
                                                            {{ $soft_data->reverse_name }}
                                                       </a>
                                                  @else
                                                       <a href="{{ route('dashboard.movie.list_movie', addParam('soft', 'asc')) }}" class="btn btn-success">
                                                            Newest first
                                                  @endif

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
                                                                 @if ($movie->providers_distinct->count() > 1)
                                                                      @foreach ($movie->providers_distinct as $provider)
                                                                           <a href="{{ route('dashboard.movie.list_movie', addParam('provider', $provider->name)) }}">
                                                                                <span class="badge badge-sm badge-warning">
                                                                                     {{ $provider->name }}
                                                                                </span>
                                                                           </a>
                                                                      @endforeach
                                                                 @else
                                                                 <a href="{{ route('dashboard.movie.list_movie', addParam('provider', 'none')) }}">
                                                                    <span class="badge badge-sm badge-warning">
                                                                         No Provider
                                                                    </span>
                                                               </a>
                                                                 @endif
                                                            @endif
                                                       </td>

                                                       <td>
                                                            <a href="{{ route('dashboard.movie.edit_movie', $movie->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                                            <button class="btn btn-sm btn-danger" onclick="del_movie({{ $movie->id }})">Delete</button>
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
     <script>
          function del_movie(id) {
               //sweet alert confirm
               Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',

                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes Delete it!'
               }).then((result) => {
                    if (result.isConfirmed) {
                         //ajax delete
                         $.ajax({
                              url: "{{ route('dashboard.movie.delete_movie') }}",
                              type: "POST",
                              data: {
                                   "_token": "{{ csrf_token() }}",
                                   "id": id
                              },
                              beforeSend: function() {
                                   Swal.fire({
                                        title: 'Please Wait !',
                                        html: 'Deleting Movie',
                                        allowOutsideClick: false,
                                        showCancelButton: false,
                                        showConfirmButton: false,
                                        willOpen: () => {
                                             Swal.showLoading();
                                        },
                                   });
                              },
                              success: function(response) {
                                   if (response.status == 1) {
                                        Swal.fire(
                                             'Deleted!',
                                             response.message,
                                             'success'
                                        )
                                        location.reload();
                                   } else if (response.status == 2) {
                                        Swal.fire(
                                             'Error!',
                                             response.message,
                                             'error'
                                        )
                                        //wait 3 sec
                                        setTimeout(function() {
                                             window.location.reload();
                                        }, 3000);

                                   } else {
                                        Swal.fire(
                                             'Failed!',
                                             response.message,
                                             'error'
                                        )
                                   }
                              },
                              error: function(response) {
                                   Swal.fire(
                                        'Failed!',
                                        'Something went wrong',
                                        'error'
                                   )
                              }
                         });
                    } else {
                         Swal.fire(
                              'Cancelled!',
                              'Your movie is safe :)',
                              'warning'
                         )
                    }
               });
          }
     </script>
@endpush
