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
                                   <h4> List Genre </h4>
                              </div>
                              <hr>


                         </div>


                         <div class="card-body">

                              <table class="table table-bordered">
                                   <thead>
                                        <tr>
                                             <th scope="col">#</th>
                                             <th scope="col">Name</th>
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
                    title: 'Are you sure?' + id,
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
