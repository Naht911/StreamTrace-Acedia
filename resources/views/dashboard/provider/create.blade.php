@extends('layouts.dashboard.dashboard_layout')
@section('title', 'Add Provider')



@push('css')
@endpush
@section('content')

     <style>
          .thumb {
               margin: 0px 0px 0 0;
               width: 200px;
               border: 1px solid #000;
               /* padding: 2px; */
               border-radius: 10px;
               margin: 5px;
          }

          .bar {
               background-color: rgba(36, 105, 92, 0.9) !important;

          }

          .img-thumb-temp {
               /* width: 100%;
                                                                                                                                                                                                                                                    height: 100%; */
               object-fit: cover;
               display: inline;
               /* position: absolute; */
          }

          /* nằm đè lên ảnh */
          .badge-custom {
               position: absolute;
               top: 5px;
               right: 0px;
               /* transform: rotate(45deg); */
               transform-origin: 100% 0;
               /* opacity: 0.5; */
               border: none !important;
          }

          .card-img {
               display: inline-block !important;
               background: none !important;
               border: none !important;
          }
     </style>
     <!-- Container-fluid starts-->
     <div class="container-fluid dashboard-default-sec">
          <div class="row">
               <div class="card">
                    <div class="card-header pb-0">
                         <h5>Add Provider</h5>
                    </div>
                    <div class="card-body">
                         <form id="create_pin">
                              <div class="row g-3">
                                   <div class="col-md-12">
                                        <label class="form-label" for="name">Name</label>
                                        <input class="form-control" id="name" name="name" type="text" placeholder="Provider name" required>
                                   </div>
                                   <div class="col-md-12">
                                        <label class="form-label" for="url">Home Url</label>
                                        <input class="form-control" id="url" name="url" type="text" placeholder="Home Url" required>
                                   </div>

                                   <div class="col-md-12 col-sm-12">

                                        <div class="mb-3">
                                             <label class="form-label" for="editor1">Description:</label>
                                             <textarea id="editor1" name="editor1" cols="30" rows="10"></textarea>
                                        </div>
                                   </div>
                                   <div class="col-md-12 col-sm-12">
                                        <div class="mb-3">
                                             <label class="form-label" for="file-input">Logo</label>
                                             <input class="form-control form-control-lg" type="file" id="file-input-logo" name="logo">
                                             <div class="alert alert-success" id="thumb-output-logo"></div>
                                        </div>
                                   </div>
                                   <div class="col-md-12 col-sm-12">
                                        <div class="mb-3">
                                             <label class="form-label" for="file-input">Background</label>
                                             <input class="form-control form-control-lg" type="file" id="file-input-background" name="background">
                                             <div class="alert alert-success" id="thumb-output-background"></div>
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
     <script src="{{ asset('assets/js/editor/ckeditor/ckeditor.js') }}"></script>


     <script>
          // Default ckeditor
          CKEDITOR.replace('editor1', {
               height: 300,
               // removePlugins: ['Heading'],
               // toolbar: ['bold', 'italic', 'bulletedList', 'numberedList', 'blockQuote', 'link'],

          });
     </script>
     <script>
          $.ajaxSetup({
               headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
          });
          $('#file-input-logo').on('change', function() { //on file input change
               if (window.File && window.FileReader && window.FileList && window.Blob) {
                    $('#thumb-output-logo').html(''); //clear html of output element
                    var data = $(this)[0].files; //this file data
                    $.each(data, function(index, file) { //loop though each file
                         if (/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)) { //check supported file type
                              var fRead = new FileReader(); //new filereader
                              fRead.onload = (function(file) { //trigger function on successful read
                                   return function(e) {
                                        var div = `
                                            <div class="card card-img" style="hight: 200px;">
                                                 <img src="${e.target.result}" class="thumb" id="img_${index}" onclick="zoom('${e.target.result}')">
                                            </div>`;
                                        $('#thumb-output-logo').append(div); //append image to output element
                                   };
                              })(file);
                              fRead.readAsDataURL(file); //URL representing the file's data.
                         }
                    });
               } else {
                    swal("Your browser doesn't support for preview image functionality");
               }
          });
          $('#file-input-background').on('change', function() { //on file input change
               if (window.File && window.FileReader && window.FileList && window.Blob) {
                    $('#thumb-output-background').html(''); //clear html of output element
                    var data = $(this)[0].files; //this file data
                    $.each(data, function(index, file) { //loop though each file
                         if (/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)) { //check supported file type
                              var fRead = new FileReader(); //new filereader
                              fRead.onload = (function(file) { //trigger function on successful read
                                   return function(e) {
                                        var div = `
                                            <div class="card card-img" style="hight: 200px;">
                                                 <img src="${e.target.result}" class="thumb" id="img_${index}" onclick="zoom('${e.target.result}')">
                                            </div>`;
                                        $('#thumb-output-background').append(div); //append image to output element
                                   };
                              })(file);
                              fRead.readAsDataURL(file); //URL representing the file's data.
                         }
                    });
               } else {
                    swal("Your browser doesn't support for preview image functionality");
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
                    //add CKEditor content
                    data.append('description', CKEDITOR.instances.editor1.getData());
                    //send ajax

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
                         url: "{{ route('dashboard.provider.store_provider') }}",
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

                                   clearForm();

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
          function clearForm() {

                    $('#create_pin')[0].reset();
                    $('#thumb-output-logo img').remove();
                    $('#thumb-output-background img').remove();
                    //clear ckeditor
                    CKEDITOR.instances.editor1.setData('');

               }
     </script>
@endpush
