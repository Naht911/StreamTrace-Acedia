@extends('layouts.dashboard.dashboard_layout')
@section('title', 'Dashboard')
@push('css')
@endpush


@section('content')


     <!-- Container-fluid starts-->
     <div class="container-fluid dashboard-default-sec">
          <div class="row">


               <div class="col-xl-12 box-col-12 des-xl-100 top-dealer-sec">
                    <div class="card">
                        <div class="card-header">
                            <h5>Dashboard</h5>
                        </div>
                        <div class="card-body">
                            <p class="text-center">
                                <a href="{{ route('dashboard.movie.create_genre') }}" class="btn btn-sm btn-success">
                                    Create Genre
                                </a>
                                <a href="{{ route('dashboard.movie.create_movie') }}" class="btn btn-sm btn-success">
                                    Create New Movie
                                </a>
                            </p>
                        </div>
                    </div>
               </div>



          </div>
     </div>



@endsection

<!-- Container-fluid Ends-->
@push('scripts')
{{-- <script>
     Swal.fire(
  'Good job!',
  'You clicked the button!',
  'success'
)
</script> --}}
@endpush
