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

    <div style="margin-left: 40px; margin-top: 80px">
        <h2 style="text-align: center; margin-left: -50px">Edit feedback</h2>
        <div style="width: 90%">
            @if (Session::has('alert'))
                <div class="alert alert-success">
                    {{ Session::get('alert') }}
                </div>
            @endif
            <form action="{{ url('dashboard/feedback/edit') }}" method="POST" enctype="multipart/form-data" id="myForm">

                @csrf
                @foreach ($data as $item)
                    <div style="border:1px solid; padding: 50px; margin-left: 20px">
                        <input readonly type="number" hidden class="form-control" name="id"
                            value="{{ $item->id }}" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email:</label>
                            <input style="height: 60px" type="text" class="form-control" name="email"
                                value="{{ $item->question }}" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Title:</label>
                            <input style="height: 60px" type="text" class="form-control" value="{{ $item->answer }}"
                                name="title" id="title">
                        </div>
                        <div style="text-align: center">
                            <button type="submit" class="btn btn-primary" id="submit"
                                onclick="checkSubmit()">Submit</button>
                        </div>
                @endforeach

                {{-- <div class="mb-3 form-check">
                        <input type="checkbox" name="buttoncheck" class="form-check-input" id="myCheckbox">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div> --}}
        </div>
        {{-- <br>
                    <div style="border:1px solid; padding: 30px; margin-left: 20px">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Processing content:</label>
                            <input required type="text" class="form-control" name="contentHandle" id="contentHandle">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">processing date:</label>
                            <input required type="date" class="form-control" name="dateHandle" id="dateHandle">
                        </div>
                        <button type="submit" class="btn btn-primary" id="submit"
                            onclick="checkSubmit()">Submit</button>

                    </div> --}}


        </form>
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
