@extends('layouts.home.home_layout')
@section('title', 'My Profile')
@push('css')
     <style>
          #profile {
               height: 100%;
          }
     </style>
@endpush


@section('content')
     <!-- SETTING -->
     <div class="container mt-5">
        <div class="row mt-5">
            <h1 class="mt-5 text-white text-center">
                Notification
            </h1>
            <div class="table mt-5">
                <table class="table text-white">
                    <thead>
                        <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Content</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($noti as $item)
                            <tr>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->content }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
     </div>





@endsection

<!-- Container-fluid Ends-->
@push('scripts')
     <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@endpush
