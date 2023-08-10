@extends('layouts.dashboard.dashboard_layout')
@section('title', 'Lisy Movie')



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
                                        List Movie

                                   </h4>
                              </div>
                         </div>


                         <div class="card-body">
                              {{-- @foreach ($movies as $movie)
                                   Title : {{ print_r($movie->title) }} <br>
                                   @if ($movie->providers != null)
                                        @foreach ($movie->providers as $provider)
                                             --- provider {{ $provider->name }} <br>
                                        @endforeach
                                   @endif
                              @endforeach --}}
                                <table class="table table-bordered">
                                     <thead>
                                            <tr>
                                                 <th scope="col">#</th>
                                                 <th scope="col">Title</th>
                                                 <th scope="col">Provider</th>
                                                 <th scope="col">Action</th>
                                            </tr>
                                     </thead>
                                     <tbody>
                                            @foreach ($movies as $movie)
                                                 <tr>
                                                    <th scope="row">{{ $movie->id }}</th>
                                                    <td>{{ $movie->title }}</td>
                                                    <td>
                                                         @if ($movie->providers != null)
                                                                @foreach ($movie->providers as $provider)
                                                                     {{ $provider->name }} <br>
                                                                @endforeach
                                                         @endif
                                                    </td>
                                                    <td>
                                                         {{-- <a href="{{ route('movie.edit', $movie->id) }}"
                                                                class="btn btn-primary">Edit</a>
                                                         <a href="{{ route('movie.delete', $movie->id) }}"
                                                                class="btn btn-danger">Delete</a> --}}
                                                    </td>
                                                 </tr>
                                            @endforeach
                                     </tbody>
                                </table>

                         </div>

                         <div class="card-footer text-end">
                            {{ $movies->links()  }}
                              <a href="{{ route('dashboard') }}" class="btn btn-danger">Back to Dashboard</a>
                         </div>

                    </div>
               </div>


          </div>
     </div>




@endsection

<!-- Container-fluid Ends-->
@push('scripts')
@endpush
