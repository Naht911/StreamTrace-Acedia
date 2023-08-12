@extends('layouts.dashboard.dashboard_layout')
@section('title', "Add provider for $movie->title movie ")



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
                                   <h4>
                                        Add provider for {{ $movie->title }} movie
                                   </h4>
                              </div>
                              <hr class="mb-3 mt-3">


                         </div>


                         <div class="card-body">

                              <form id="create_pin">
                                @csrf
                                   <div class="row g-3">
                                        <div class="col-md-4 col-sm-6 col-12">
                                             <label class="form-label" for="streaming_service_provider_id">Provider</label>
                                             <select class="form-select" id="streaming_service_provider_id" name="streaming_service_provider_id" required>
                                                  <option value="">Select Provider</option>
                                                  @foreach ($providers as $provider)
                                                       <option value="{{ $provider->id }}">{{ $provider->name }}</option>
                                                  @endforeach
                                             </select>
                                        </div>
                                        <div class="col-md-4 col-sm-6 col-12">
                                             <label class="form-label" for="type_price_id">Type of Price</label>
                                             <select class="form-select" id="type_price_id" name="type_price_id" required>
                                                  <option value="">Select Type Price</option>
                                                  @foreach ($type_prices as $type_price)
                                                       <option value="{{ $type_price->id }}">{{ $type_price->name }}</option>
                                                  @endforeach
                                             </select>
                                        </div>
                                        <div class="col-md-4 col-12">
                                             <label class="form-label" for="movie_resolution_id">Movie Resolutions</label>
                                             <select class="form-select" id="movie_resolution_id" name="movie_resolution_id" required>
                                                  <option value="">Select Movie Resolutions</option>
                                                  @foreach ($movie_resolutions as $movie_resolution)
                                                       <option value="{{ $movie_resolution->id }}">{{ $movie_resolution->name }}</option>
                                                  @endforeach
                                             </select>
                                        </div>
                                        <div class="col-md-6 col-12">
                                             <label class="form-label" for="url">Stand Url</label>
                                             <input type="text" class="form-control" id="url" name="url" placeholder="Stand Url" required>
                                        </div>
                                        <div class="col-md-6 col-12">
                                             <label class="form-label" for="price">Price</label>
                                             <input type="number" class="form-control" id="price" name="price" placeholder="Price" step="0.01" min="0" required>
                                        </div>

                                   </div>
                                   <hr>
                                   <div class="d-flex justify-content-between mt-3">
                                        <a href="{{ route('dashboard.movie.show_movie_provider', $movie->id) }}" class="btn btn-danger">
                                            <i class="fa fa-arrow-left"></i>
                                            Back
                                        </a>



                                        <button type="submit" id="submit" class="btn btn-primary">Submit</button>
                                   </div>
                              </form>


                         </div>

                         {{-- <div class="card-footer text-end">
                              {{ $movies->links() }}
                              <a href="{{ route('dashboard') }}" class="btn btn-danger">Back to Dashboard</a>
                         </div> --}}

                    </div>
               </div>


          </div>
     </div>




@endsection

<!-- Container-fluid Ends-->
@push('scripts')
     <script>
          $(document).ready(function() {

               $('#create_pin').on('submit', function(e) {
                    e.preventDefault();
                    var formData = new FormData(this);
                    $.ajax({
                         url: "{{ route('dashboard.movie.store_movie_provider', $movie->id) }}",
                         type: "POST",
                         data: formData,
                         cache: false,
                         contentType: false,
                         processData: false,
                         beforeSend: function() {
                              $('#submit').attr('disabled', 'disabled');
                              $('#submit').html('Please wait...');
                              Swal.fire({
                                   title: 'Please Wait !',
                                   text: 'Provider is being added',
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

                                   Swal.fire({
                                        icon: 'success',
                                        title: 'Success',
                                        text: response.message,
                                        showConfirmButton: true,
                                        timer: 1500
                                   });
                                   $('#submit').removeAttr('disabled');
                                   $('#submit').html('Save');
                                   $('#create_pin')[0].reset();
                              } else {
                                   Swal.fire({
                                        icon: 'error',
                                        title: 'Oops...',
                                        text: response.message,
                                   });
                                   $('#submit').removeAttr('disabled');
                                   $('#submit').html('Save');
                              }
                         },
                         error: function(xhr, ajaxOptions, thrownError) {
                              console.log(xhr);
                              Swal.fire({
                                   icon: 'error',
                                   title: 'Oops...',
                                   text: 'Something went wrong! Please try again later.',
                              });
                              $('#submit').removeAttr('disabled');
                              $('#submit').html('Save');
                         }
                    });
               });
          });
     </script>
@endpush
