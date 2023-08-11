@extends('layouts.dashboard.dashboard_layout')
@section('title', 'Add Movie')



@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/sweetalert2.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/select2.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
@endpush
@section('content')
    @yield('breadcrumb-list')
    <!-- Container-fluid starts-->

    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 90%;
            margin-left: 40px;
            margin-right: 40px;
            overflow: auto;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: center;
            padding: 8px;

        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>

    <body>
        <div style="margin: 40px ">
            <div id="item-list">
                <h2 style="text-align: center; margin-top: 20px"> frequently asked questions</h2>
                <br>
                <div style="overflow: auto; height: 300px;">
                    <table>
                        <tr>

                            <th>Question</th>
                            <th>Reply</th>
                            {{-- <th>Processing Content</th>
                    <th>Processing date</th> --}}
                            <th>Action</th>
                        </tr>

                        <!-- Nội dung bạn muốn cuộn -->

                        @foreach ($data as $item)
                            @if ($item->contentHandle == '')
                                <tr>
                                    <td scope="row">{{ $item->question }}</td>
                                    <td>{{ $item->answer }}</td>

                                    {{-- <td>{{ $item->contentHandle }}</td>
                            <td>{{ $item->dateHandle }}</td> --}}
                                    <td style="">
                                        <button><a
                                                href="{{ asset('dashboard/FAQ/vieweditFAQ/' . $item->id) }}">edit</a></button>
                                        <button> <a
                                                href="{{ asset('dashboard/FAQ/destroyFAQ/' . $item->id) }}">Delete</a></button>
                                    </td>
                                </tr>
                            @endif

                </div>
                @endforeach
                </table>

                {{-- {{ $data->links() }} --}}
            </div>

        </div>
    </body>


    </html>
@endsection

<!-- Container-fluid Ends-->
@push('scripts')
    <script src="{{ asset('assets/js/editor/ckeditor/ckeditor.js') }}"></script>

    <script src="{{ asset('assets/js/sweet-alert/sweetalert.min.js') }}"></script>
    {{-- <script src="{{ asset('assets/js/sweet-alert/app.js') }}"></script> --}}
    <script src="{{ asset('assets/js/select2/select2.full.min.js') }}"></script>
@endpush
