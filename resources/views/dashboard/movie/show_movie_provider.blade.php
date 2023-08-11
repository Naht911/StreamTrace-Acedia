@extends('layouts.dashboard.dashboard_layout')
@section('title', "$movie->title's Provider & Price")



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
                                   <h4> {{ $movie->title }}'s Provider & Price</h4>
                              </div>
                              <hr>
                              <p class="text-center">
                                   <a href="{{ route('dashboard.movie.add_movie_provider', $movie->id) }}" class="btn btn-sm btn-success">
                                        <i class="fas fa-plus"></i> Add Provider & Price
                                   </a>
                              </p>

                         </div>


                         <div class="card-body">



                              <table class="table table-bordered">
                                   <thead>
                                        <tr>
                                             <th scope="col">#</th>
                                             <th scope="col">Provider name</th>
                                             <th scope="col">Price</th>
                                             <th scope="col">Type price</th>
                                             <th scope="col">Resolution</th>
                                             <th scope="col">Action</th>
                                        </tr>
                                   </thead>
                                   <tbody>
                                        @foreach ($movie->providers as $provider)

                                             <tr>
                                                  <th scope="row">
                                                       {{ $loop->iteration }}
                                                  </th>
                                                  <td>
                                                       {{ $provider->name }}
                                                  </td>
                                                  <td>
                                                       ${{ number_format($provider->pivot->price) }}
                                                  </td>
                                                  <td>
                                                       {{ $provider->pivot->typePrice->name }}
                                                  </td>
                                                  <td>
                                                       {{ $provider->pivot->resolution->name }}
                                                  </td>
                                                  <td>
                                                       <a href="{{ route('dashboard.movie.edit_movie_provider', ['movie_id' => $movie->id, 'id' => $provider->pivot->id]) }}" class="btn btn-sm btn-primary">
                                                            <i class="fas fa-edit"></i>
                                                       </a>
                                                       <button onclick="del_provider({{ $movie->id }},{{ $provider->pivot->id }})" class="btn btn-sm btn-danger">
                                                            <i class="fas fa-trash"></i>
                                                       </button>
                                                  </td>
                                             </tr>
                                        @endforeach

                                   </tbody>
                              </table>

                         </div>

                         <div class="card-footer">
                              {{-- {{ $movies->links() }} --}}
                              <a href="{{ route('dashboard.movie.list_movie') }}" class="btn btn-danger">
                                   <i class="fa fa-arrow-left"></i>
                                   Back
                              </a>
                         </div>

                    </div>
               </div>


          </div>
     </div>




@endsection

<!-- Container-fluid Ends-->
@push('scripts')
     <script>
          function del_provider(movie_id, provider_id) {
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
                              url: "{{ route('dashboard.movie.delete_movie_provider') }}",
                              type: "POST",
                              data: {
                                   "_token": "{{ csrf_token() }}",
                                   "movie_id": movie_id,
                                   "provider_id": provider_id,
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
                              'Your movie provider has not been deleted.',
                              'warning'
                         )
                    }
               });
          }
     </script>
@endpush
