@extends('layouts.dashboard.dashboard_layout')
@section('title', 'Add Movie')



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
            <div style="" class="card">

                <div style="width: 90%">
                    @if (Session::has('alert'))
                        <div class="alert alert-success">
                            {{ Session::get('alert') }}
                        </div>
                    @endif
                    {{-- <form action="{{ url('dashboard/feedback/update_feedback') }}" method="POST" enctype="multipart/form-data"
                id="myForm"> --}}

                    @csrf
                    {{-- @foreach ($data as $item) --}}
                    <div class="card-body">
                        <form class="needs-validation" method="POST" {{-- action="{{ route('dashboard.feedback.update_feedback') }}"  --}} enctype="multipart/form-data">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label" for="validationCustom01">Email</label>
                                    <input readonly class="form-control" id="validationCustom01" name="email"
                                        type="text" value="{{ $data->email }}" required="">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="validationCustom02">Title</label>
                                    <input readonly class="form-control" id="validationCustom02" name="title"
                                        type="text" value="{{ $data->title }}" required="">
                                </div>
                                {{-- <div class="col-md-12">
                                    <label class="form-label" for="validationCustom02">Content</label>
                                    <input readonly class="form-control" id="validationCustom02" name="content"
                                        type="text" value="{{ $item->content }}" required="">
                                </div> --}}
                                <div class="col-md-12 mt-1">
                                    <label class="form-label" for="validationCustom02">Content</label>
                                    <textarea readonly class="form-control" id="validationCustom02" name="content" type="text" value=""
                                        rows="5" required="">{{ $data->content }}</textarea>
                                </div>
                            </div>
                            <div class="row g-3 mt-1">
                                <div class="col-md-12 col-sm-12">

                                    <div class="mb-3">
                                        <label class="form-label" for="editor1">Processing Content </label>
                                        <textarea id="editor1" name="content_handle" cols="30" rows="10"></textarea>
                                        {{-- <input type="text" name="content_handle"> --}}
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-primary" type="submit">Submit form</button>
                        </form>
                    </div>
                    {{-- @endforeach --}}

                    {{-- </form> --}}
                </div>
            </div>

        </div>
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
@endpush

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
    integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
</script>
