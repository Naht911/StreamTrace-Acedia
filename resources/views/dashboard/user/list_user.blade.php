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
                                   <h4> List User </h4>
                              </div>
                              <hr>
                              {{-- <h6 class="text-center mb-3">
                                   Search
                              </h6> --}}
                              <form action="{{ route('dashboard.user.list_user') }}" method="get">
                                   <div class="row">
                                        <div class="col-sm-6 col-12">
                                             <div class="mb-3 m-form__group">
                                                  <div class="input-group">
                                                       <span class="input-group-text">User Name</span>
                                                       <input type="text" class="form-control" name="name" id="name" value="{{ request()->query('name') }}">
                                                  </div>
                                             </div>
                                        </div>
                                        <div class="col-sm-6 col-12">
                                             <div class="mb-3 m-form__group">
                                                  <input type="submit" class="btn btn-secondary" value="Search">
                                                  {{-- <a href="{{ route('dashboard.movie.list_movie') }}" class="btn btn-danger">Clear</a>

                                                  @if ($soft_data != null)
                                                       <a href="{{ route('dashboard.movie.list_movie', addParam('soft', $soft_data->reverse_slug)) }}" class="btn btn-success">
                                                            {{ $soft_data->reverse_name }}
                                                       </a>
                                                  @else
                                                       <a href="{{ route('dashboard.movie.list_movie', addParam('soft', 'asc')) }}" class="btn btn-success">
                                                            Newest first
                                                  @endif --}}

                                             </div>
                                        </div>
                                   </div>
                              </form>
                         </div>


                         <div class="card-body">

                              <p> Filter :
                                   @foreach (request()->query() as $key => $q)
                                        {{-- @if ($key == 'provider' && $q != null)
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
                                        @endif --}}
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
                                        <a href="{{ route('dashboard.user.list_user') }}">
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
                                             {{-- <th scope="col">

                                                  @if ($soft_data != null)
                                                       <a href="{{ route('dashboard.user.list_user', addParam('soft', $soft_data->reverse_slug)) }}">
                                                            {!! $soft_data->reverse_slug == 'asc' ? '#<i class="fa-solid fa-sort-down"></i>' : '<i class="fa-solid fa-sort-up"></i>#' !!}
                                                       </a>
                                                  @else
                                                       <a href="{{ route('dashboard.user.list_user', addParam('soft', 'asc')) }}">
                                                            <i class="fa-solid fa-sort"></i>
                                                       </a>
                                                  @endif
                                             </th> --}}
                                             <th scope="col"><i class="fa-solid fa-caret-down"></i></th>
                                             <th scope="col">Name</th>
                                             <th scope="col">Email</th>
                                             <th scope="col">Role</th>
                                             <th scope="col">Action</th>
                                        </tr>
                                   </thead>
                                   <tbody>
                                        @if ($users->isEmpty())
                                             <tr>
                                                  <td colspan="5" class="text-center">No Data</td>
                                             </tr>
                                        @else
                                             @foreach ($users as $key => $user)
                                                  <tr>
                                                       <th scope="row">{{ $key+1 }}</th>
                                                       <td>{{ $user->name }}</td>
                                                       <td>{{ $user->email }}</td>
                                                       <td>{{ $user->role }}</td>

                                                       <td >
                                                            <a href="{{ route('dashboard.user.edit_user', $user->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                                            {{-- <button class="btn btn-sm btn-danger" onclick="del_movie({{ $movie->id }})">Delete</button> --}}
                                                       </td>
                                                  </tr>
                                             @endforeach
                                        @endif
                                   </tbody>
                              </table>

                         </div>

                         <div class="card-footer text-end">
                              {{-- {{ $users->links() }} --}}
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
