@extends('layouts.dashboard.dashboard_layout')
@section('title', 'Add User')



@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/sweetalert2.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/select2.css') }}">
@endpush
@section('content')
    @yield('breadcrumb-list')
    <!-- Container-fluid starts-->
    <div class="container-fluid dashboard-default-sec">
        <div class="row">

            {{-- <script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script> --}}
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
            </style>
            <!-- Default Textbox start-->

            <div class="col-xl-12 box-col-12 des-xl-100 top-dealer-sec">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="text-center">
                            <h4>Add New User</h4>
                        </div>
                    </div>
                    <form class="form theme-form" method="POST" id="create_pin" enctype="multipart/form-data">
                        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-6 col-sm-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="name">User name</label>
                                        <input class="form-control form-control-lg" id="title" name="title"
                                            type="text" placeholder="Movie name" onkeyup="gen_slug(this)">
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="original_title">Email</label>
                                        <input class="form-control form-control-lg" id="original_title"
                                            name="original_title" type="text" placeholder="Movie Original Title">
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="slug">Password</label>
                                        <input class="form-control form-control-lg" id="slug" name="slug"
                                            type="text" placeholder="Slug">
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="mb-3">
                                        <label class="form-label">Genres</label>
                                        <select class="form-control form-control-lg list-category" multiple="multiple"
                                            name="genre[]" id="genre">
                                            @foreach ($genres as $genre)
                                                <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="duration">Duration</label>
                                        <input class="form-control form-control-lg" id="duration" name="duration"
                                            type="text" placeholder="Duration">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="release_year">Release Year</label>
                                        <select class="form-control form-control-lg" id="release_year" name="release_year">
                                            @for ($i = 2024; $i >= 1900; $i--)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="file-input">Poster</label>
                                        <input class="form-control form-control-lg" type="file" id="file-input"
                                            name="poster">
                                        <div class="alert alert-success" id="thumb-output"></div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="trailer_url">Trailer Url</label>
                                        <input class="form-control form-control-lg" type="text" id="trailer_url"
                                            name="trailer_url">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="country">Country</label>
                                        <input class="form-control form-control-lg" type="text" id="country"
                                            name="country">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="language">Language</label>
                                        <input class="form-control form-control-lg" type="text" id="language"
                                            name="language">
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12">

                                    <div class="mb-3">
                                        <label class="form-label" for="editor1">Synopsis:</label>
                                        <textarea id="editor1" name="editor1" cols="30" rows="10"></textarea>
                                    </div>
                                </div>
                            </div>


                        </div>

                        <div class="card-footer text-end">
                            <div class="col-md-12 col-sm-12">
                                <div class="mb-3">
                                    <div class="progress">
                                        <div class="progress-bar bar" role="progressbar" aria-valuenow="0"
                                            aria-valuetext="0" aria-valuemin="0" aria-valuemax="100">
                                            <span id="progress_inside"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary" type="submit" id="submit">Save</button>
                            <input class="btn btn-light" type="reset" value="Clear">
                            <a href="{{ route('dashboard') }}" class="btn btn-danger">Back to Dashboard</a>
                        </div>
                    </form>
                </div>
            </div>
            <style>
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


        </div>
    </div>




@endsection

<!-- Container-fluid Ends-->
@push('scripts')
    <script src="{{ asset('assets/js/editor/ckeditor/ckeditor.js') }}"></script>

    <script src="{{ asset('assets/js/sweet-alert/sweetalert.min.js') }}"></script>
    {{-- <script src="{{ asset('assets/js/sweet-alert/app.js') }}"></script> --}}
    <script src="{{ asset('assets/js/select2/select2.full.min.js') }}"></script>
    <script>
        // Default ckeditor
        CKEDITOR.replace('editor1', {
            height: 300,
            // removePlugins: ['Heading'],
            // toolbar: ['bold', 'italic', 'bulletedList', 'numberedList', 'blockQuote', 'link'],

        });
    </script>
    <script>
        "use strict";
        setTimeout(function() {
            (function($) {
                "use strict";
                // With Placeholder
                $(".list-category").select2({
                    placeholder: "Choose Genre"
                });
            })(jQuery);
        }, 350);
    </script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function zoom(img) {
            Swal.fire({
                imageUrl: img,
                imageWidth: 800,
                //   imageHeight: 600,
                imageAlt: 'Custom image',
                confirmButtonText: 'Close',
                size: 'lg',
            })
        }

        $(document).ready(function() {
            $('#file-input').on('change', function() { //on file input change
                if (window.File && window.FileReader && window.FileList && window.Blob) {
                    $('#thumb-output').html(''); //clear html of output element
                    var data = $(this)[0].files; //this file data
                    $.each(data, function(index, file) { //loop though each file
                        if (/(\.|\/)(gif|jpe?g|png)$/i.test(file
                                .type)) { //check supported file type
                            var fRead = new FileReader(); //new filereader
                            fRead.onload = (function(file) { //trigger function on successful read
                                return function(e) {
                                    var div = `
                                            <div class="card card-img" style="hight: 200px;">
                                                 <img src="${e.target.result}" class="thumb" id="img_${index}" onclick="zoom('${e.target.result}')">
                                            </div>`;
                                    $('#thumb-output').append(
                                        div); //append image to output element
                                };
                            })(file);
                            fRead.readAsDataURL(file); //URL representing the file's data.
                        }
                    });
                } else {
                    swal("Your browser doesn't support for preview image functionality");
                }
            });


            //based on: http://stackoverflow.com/a/9622978
            $('#create_pin').on('submit', function(e) {
                e.preventDefault();
                var form = e.target;
                var data = new FormData(form);
                var synopsis = CKEDITOR.instances.editor1.getData();
                data.append('synopsis', synopsis);
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

                                    setTimeout(function() {
                                        bar.width(0);
                                    }, 1000);
                                    percentVal = 0 + '%';
                                    percenttext = 0;
                                };
                                $("#progress_inside").text(percenttext + '% Complete');
                            }
                        }, false);
                        return xhr;
                    },
                    url: "{{ route('dashboard.movie.store_movie') }}",
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
                            swal("Done!", data.message, "success");
                            $('#create_pin')[0].reset();
                            $('#thumb-output img').remove();
                            clearForm();
                        } else if (data.status == 2) {
                            swal("Error!", data.message, "error");
                            //  window.location.assign('/login');
                        } else {
                            swal("Error!", data.message, "error");
                        }
                    },
                    error: function(data) {
                        $("#submit").text("Save");
                        $('#submit').prop('disabled', false);
                        swal("Error!",
                            "Something went wrong, please try again later.",
                            "error");

                    }

                })
            });


        });

        function clearForm() {

            $('#create_pin')[0].reset();
            $('#thumb-output img').remove();
            //clear ckeditor
            CKEDITOR.instances.editor1.setData('');
            //clear select2
            $('.list-category').val(null).trigger('change');
        }
    </script>
@endpush
