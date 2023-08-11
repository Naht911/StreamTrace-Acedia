@extends('layouts.dashboard.dashboard_layout')
@section('title', 'List Genre')



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
                                             <th scope="col">Count movies</th>
                                             <th scope="col">Action</th>
                                        </tr>
                                   </thead>
                                   <tbody>
                                        @if ($genres->isEmpty())
                                             <tr>
                                                  <td colspan="4" class="text-center">No Data</td>
                                             </tr>
                                        @else
                                             @foreach ($genres as $genre)
                                                  <tr>
                                                       <th scope="row">{{ $genre->id }}</th>
                                                       <td>{{ $genre->name }}</td>
                                                       <td>{{ number_format($genre->movies->count()) }}</td>


                                                       <td>
                                                            <a href="{{ route('dashboard.movie.edit_genre', $genre->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                                            <button class="btn btn-sm btn-danger" onclick="del_genre({{ $genre->id }})">Delete</button>
                                                       </td>
                                                  </tr>
                                             @endforeach
                                        @endif
                                   </tbody>
                              </table>

                         </div>

                         <div class="card-footer text-end">
                              {{ $genres->links() }}
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
          function del_genre(id) {
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
                              url: "{{ route('dashboard.movie.delete_genre') }}",
                              type: "POST",
                              data: {
                                   "_token": "{{ csrf_token() }}",
                                   "id": id
                              },
                              beforeSend: function() {
                                   Swal.fire({
                                        title: 'Please Wait !',
                                        html: 'Deleting genre',
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
                              'Your genre is safe :)',
                              'warning'
                         )
                    }
               });
          }
     </script>
@endpush
