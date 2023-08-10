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
    <div style="">
        <div id="item-list">
            <h2 style="text-align: center">Feedback User</h2>
            <br>
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
                    text-align: left;
                    padding: 8px;
                }

                tr:nth-child(even) {
                    background-color: #dddddd;
                }
            </style>
            <div style="overflow: auto; height: 300px;">
                <table>
                    <tr>
                        <th>Email</th>
                        <th>Title</th>
                        <th>Content</th>
                        {{-- <th>Processing Content</th>
                    <th>Processing date</th> --}}
                        <th>Action</th>
                    </tr>

                    <!-- Nội dung bạn muốn cuộn -->

                    @foreach ($data as $item)
                        @if ($item->content_handle == '')
                            <tr>
                                <td scope="row">{{ $item->email }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->content }}</td>
                                {{-- <td>{{ $item->contentHandle }}</td>
                            <td>{{ $item->dateHandle }}</td> --}}
                                <td>
                                    <button><a
                                            href="{{ asset('dashboard/feedback/viewEditFeedback/' . $item->id) }}">Processing</a></button>
                                    <button> <a
                                            href="{{ asset('dashboard/feedback/destroyFeedback/' . $item->id) }}">Delete</a></button>
                                </td>
                            </tr>
                        @endif

            </div>
            @endforeach
            </table>

            {{-- {{ $data->links() }} --}}
        </div>
        <hr style="margin-top:30px; text-align: center">
        {{-- <div style="margin: auto">

        </div> --}}
        <div id="item-list">
            <h2 style="text-align: center">Pending feedback </h2>
            <div style="overflow: auto; height: 300px;">
                <table>
                    <tr>
                        <th>Email</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Processing Content</th>
                        <th>processing term</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($data as $data)
                        @if ($data->content_handle != '')
                            <tr>
                                <td scope="row">{{ $data->email }}</td>
                                <td>{{ $data->title }}</td>
                                <td>{{ $data->content }}</td>
                                <td>{{ $data->content_handle }}</td>
                                <td>{{ $data->date_handle }}</td>
                                <td>
                                    <button><a
                                            href="{{ asset('dashboard/feedback/viewEditFeedback/' . $data->id) }}">Processing</a></button>
                                    <button> <a
                                            href="{{ asset('dashboard/feedback/destroyFeedback/' . $data->id) }}">Delete</a></button>
                                </td>
                                </td>
                            </tr>
                        @endif
                    @endforeach

                </table>
            </div>
            {{-- {{ $data2->links() }} --}}
        </div>
    </div>




@endsection

<!-- Container-fluid Ends-->
@push('scripts')
    <script src="{{ asset('assets/js/editor/ckeditor/ckeditor.js') }}"></script>

    <script src="{{ asset('assets/js/sweet-alert/sweetalert.min.js') }}"></script>
    {{-- <script src="{{ asset('assets/js/sweet-alert/app.js') }}"></script> --}}
    <script src="{{ asset('assets/js/select2/select2.full.min.js') }}"></script>
@endpush
