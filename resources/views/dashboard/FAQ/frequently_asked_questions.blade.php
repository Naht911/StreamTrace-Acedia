@extends('layouts.dashboard.dashboard_layout')
@section('title', 'Add Movie')



@push('css')
@endpush
@section('content')
    @yield('breadcrumb-list')
    <div class="container-fluid dashboard-default-sec">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">

                    <div class="table-responsive">
                        <div style="">
                            <div id="item-list">


                                <div>

                                    </form>
                                </div>
                                <div class="card-body">
                                    <div class="card-head pb-0">
                                        <h3 class="display-3 mb-4 text-center">Frequently Asked Questions </h3>
                                    </div>


                                    <div class="table-responsive">
                                        <div id="basic-1_wrapper" class="dataTables_wrapper no-footer">
                                            <h5>
                                            </h5>
                                            <table class="display dataTable no-footer" id="basic-1" role="grid"
                                                aria-describedby="basic-1_info">
                                                <div class="mb-3">
                                                    <a class=""
                                                        href="{{ route('dashboard.FAQ.create_FAQ') }}"><button>
                                                            <i class="da-solid fa-plus "></i> Create FAQ
                                                        </button></a>
                                                </div>
                                                <thead>

                                                    <tr role="row">
                                                        <th class="sorting_asc text-sm-start" tabindex="0"
                                                        aria-controls="basic-1" rowspan="1" colspan="1"
                                                        aria-sort="ascending"
                                                        aria-label="Name: activate to sort column descending"
                                                        style="width: 10px;"><i class="fa-solid fa-caret-down"></i></th>
                                                        <th class="sorting_asc text-sm-start" tabindex="0"
                                                            aria-controls="basic-1" rowspan="1" colspan="1"
                                                            aria-sort="ascending"
                                                            aria-label="Name: activate to sort column descending"
                                                            style="width: 60.859px;">
                                                            Question
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="basic-1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Position: activate to sort column ascending"
                                                            style="width: 233.297px;">
                                                            Answer</th>
                                                        <th class="sorting" tabindex="0" aria-controls="basic-1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Office: activate to sort column ascending"
                                                            style="width: 103.891px;">
                                                            Action</th>


                                                    </tr>
                                                </thead>
                                                <tr role="row" class="odd">

                                                    @foreach ($data as $key => $item)
                                                <tr>
                                                    <td>{{$key+1}}</td>
                                                    <td class="sorting_1">{{ $item->question }}</td>
                                                    <td>{{ $item->answer }}</td>
                                                    <td>
                                                        <a
                                                            href="{{ route('dashboard.FAQ.edit_FAQ', $item->id) }}"><button class="btn btn-sm btn-success">Edit</button></a>
                                                        {{-- <a 
                                                            href="{{ route('dashboard.FAQ.delete_FAQ', $item->id) }}">
                                                            <button class="btn-danger">Delete</button></a> --}}
                                                        <button onclick="del_faq({{ $item->id }})" class="btn btn-sm btn-danger">
                                                                Delete
                                                           </button>
                                                    </td>

                                                </tr>
                                                @endforeach

                                            </table>
                                            <div> {{ $data->links() }}</div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr style="margin-top:30px; text-align: center">
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->


@endsection
<script>
    // function submit() {

    // }
</script>

<!-- Container-fluid Ends-->
@push('scripts')
<script>
    function del_faq(id) {
         //sweet alert confirm
         Swal.fire({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              icon: 'warning',

              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes Delete it!'
         }).then((result) => {
              if (result.isConfirmed) {
                   //ajax delete
                   $.ajax({
                        url: "{{ route('dashboard.FAQ.delete_FAQ') }}",
                        type: "POST",
                        data: {
                             "_token": "{{ csrf_token() }}",
                             "id": id,
                        },
                        beforeSend: function() {
                             Swal.fire({
                                  title: 'Please Wait !',
                                  html: 'Deleting FAQ',
                                  allowOutsideClick: false,
                                  showCancelButton: false,
                                  showConfirmButton: false,
                                  willOpen: () => {
                                       Swal.showLoading();
                                  },
                             });
                        },
                        success: function(response) {
                             if (response.status == 1) {
                                  Swal.fire(
                                       'Deleted!',
                                       response.message,
                                       'success'
                                  )
                                  location.reload();
                             } else if (response.status == 2) {
                                  Swal.fire(
                                       'Error!',
                                       response.message,
                                       'error'
                                  )
                                  //wait 3 sec
                                  setTimeout(function() {
                                       window.location.reload();
                                  }, 4000);

                             } else {
                                  Swal.fire(
                                       'Failed!',
                                       response.message,
                                       'error'
                                  )
                             }
                        },
                        error: function(response) {
                             Swal.fire(
                                  'Failed!',
                                  'Something went wrong',
                                  'error'
                             )
                        }
                   });
              } else {
                   Swal.fire(
                        'Cancelled!',
                        'Your FAQ has not been deleted.',
                        'warning'
                   )
              }
         });
    }
</script>
@endpush
