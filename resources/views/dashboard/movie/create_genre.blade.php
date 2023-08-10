@extends('layouts.dashboard.dashboard_layout')
@section('title', 'Add Genre')



@push('css')
@endpush
@section('content')

     <script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
     <!-- Container-fluid starts-->
     <div class="container-fluid dashboard-default-sec">
          <div class="row">
               <div class="card">
                    <div class="card-header pb-0">
                         <h5>Add Genre</h5>
                    </div>
                    <div class="card-body">
                         <form id="create_pin">
                              <div class="row g-3">
                                   <div class="col-md-12">
                                        <label class="form-label" for="name">Name</label>
                                        <input class="form-control" id="name" name="name" type="text" placeholder="Genre name" required onkeyup="gen_slug(this)">
                                   </div>

                                   <div class="col-md-12 mb-3">
                                        <label class="form-label" for="slug">Slug</label>
                                        <div class="input-group">
                                             <span class="input-group-text" id="inputGroupPrepend2">url</span>
                                             <input class="form-control" id="slug" name="slug" type="text" placeholder="Genre slug" aria-describedby="inputGroupPrepend2" required>
                                        </div>
                                   </div>
                              </div>
                              <div class="col-md-12 col-sm-12">
                                   <div class="mb-3">
                                        <div class="progress">
                                             <div class="progress-bar bar" role="progressbar" aria-valuenow="0" aria-valuetext="0" aria-valuemin="0" aria-valuemax="100">
                                                  <span id="progress_inside"></span>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                              <button class="btn btn-primary" type="submit" id="submit">Save</button>
                         </form>
                    </div>
               </div>
          </div>

     </div>




@endsection

@push('scripts')
     <script>
          $.ajaxSetup({
               headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
          });

          $(document).ready(function() {
               //based on: http://stackoverflow.com/a/9622978
               $('#create_pin').on('submit', function(e) {
                    e.preventDefault();
                    var form = e.target;
                    var data = new FormData(form);
                    //add csrf token
                    data.append('_token', '{{ csrf_token() }}');


                    var bar = $('.bar');
                    var percent = $('.percent');
                    var status = $('#status');
                    $("#submit").text("Processing...");
                    $('#submit').prop('disabled', true);
                    $.ajax({
                         xhr: function() {
                              var xhr = new window.XMLHttpRequest();
                              xhr.upload.addEventListener("progress", function(evt) {
                                   if (evt.lengthComputable) {
                                        var percentComplete = evt.loaded / evt.total;
                                        percentComplete = parseInt(percentComplete * 100);
                                        var percentVal = percentComplete + '%';
                                        var percenttext = percentComplete;
                                        bar.width(percentVal);

                                        if (percentComplete === 100) {


                                             percentVal = 0 + '%';
                                             percenttext = 0;
                                        };
                                        $("#progress_inside").text(percenttext + '% Complete');
                                   }
                              }, false);
                              return xhr;
                         },
                         url: "{{ route('dashboard.movie.store_genre') }}",
                         method: "POST",
                         processData: false,
                         contentType: false,
                         dataType: 'json',
                         data: data,
                         processData: false,
                         success: function(data) {
                              $("#submit").text("Save");
                              $('#submit').prop('disabled', false);
                              if (data.status == 1) {
                                   Swal.fire({
                                        // position: 'top-end',
                                        icon: 'success',
                                        title: data.message,
                                        // showConfirmButton: false,
                                        // timer: 1500
                                   })

                                   $('#create_pin')[0].reset();

                              } else {
                                      Swal.fire({
                                         icon: 'error',
                                         title: 'Oops...',
                                         text: data.message,
                                      })
                              }
                         },
                         error: function(data) {
                              $("#submit").text("Lưu");
                              $('#submit').prop('disabled', false);
                                Swal.fire({
                                     icon: 'error',
                                     title: 'Oops...',
                                     text: 'Something went wrong!',
                                })

                         }

                    })
               })
          })
     </script>
@endpush
