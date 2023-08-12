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

                                                    @foreach ($data as $item)
                                                <tr>
                                                    <td class="sorting_1">{{ $item->question }}</td>
                                                    <td>{{ $item->answer }}</td>
                                                    <td>
                                                        <a
                                                            href="{{ route('dashboard.FAQ.edit_FAQ', $item->id) }}"><button>Edit</button></a>
                                                        <a href="{{ route('dashboard.FAQ.delete_FAQ', $item->id) }}">
                                                            <button class="btn-danger">Delete</button></a>
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
@endpush
