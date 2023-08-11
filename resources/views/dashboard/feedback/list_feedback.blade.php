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

                                <br>
                                <div>

                                </div>
                                <div>



                                    {{-- {{ $status ? '' : '' }} --}}
                                    </form>
                                </div>
                                <div class="card-body">
                                    <h2>Feedback {{ $status }}</h2>
                                    <div class="row">
                                        <div class="col-3">

                                            <form action="" method="get">
                                                <select class="form-select" value='{{ $status }}'
                                                    name="status"onchange="submit()" aria-label="Default select">
                                                    <option value="">All</option>
                                                    <option value="received">Received</option>
                                                    <option value="pending">Pending</option>
                                                    <option value="completed">Completed</option>
                                                </select>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <div id="basic-1_wrapper" class="dataTables_wrapper no-footer">
                                            <h5>
                                                {{-- @if ($item->status == 'received')
                                                    Feedback received !!
                                                @endif

                                                @if ($item->status == 'pending')
                                                    Feedback is pending
                                                @endif
                                                @if ($item->status == 'completed')
                                                    Feedback completed
                                                @endif --}}
                                            </h5>
                                            <table class="display dataTable no-footer" id="basic-1" role="grid"
                                                aria-describedby="basic-1_info">
                                                <thead>
                                                    <tr role="row">
                                                        <th class="sorting_asc text-sm-start" tabindex="0"
                                                            aria-controls="basic-1" rowspan="1" colspan="1"
                                                            aria-sort="ascending"
                                                            aria-label="Name: activate to sort column descending"
                                                            style="width: 60.859px;">
                                                            Email
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="basic-1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Position: activate to sort column ascending"
                                                            style="width: 233.297px;">
                                                            Title</th>
                                                        <th class="sorting" tabindex="0" aria-controls="basic-1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Office: activate to sort column ascending"
                                                            style="width: 103.891px;">
                                                            Content</th>
                                                        <th class="sorting" tabindex="0" aria-controls="basic-1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Age: activate to sort column ascending"
                                                            style="width: 42.3594px;">
                                                            Status
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="basic-1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Age: activate to sort column ascending"
                                                            style="width: 42.3594px;">
                                                            Processing content
                                                        </th>

                                                        <th class="sorting" tabindex="0" aria-controls="basic-1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Salary: activate to sort column ascending"
                                                            style="width: 78.2344px;">
                                                            Action</th>
                                                    </tr>
                                                </thead>
                                                <tr role="row" class="odd">
                                                    @foreach ($data2 as $item)
                                                <tr>
                                                    <td class="sorting_1">{{ $item->email }}</td>
                                                    <td>{{ $item->title }}</td>
                                                    <td>{{ $item->content }}</td>
                                                    <td>{{ $item->status }}</td>
                                                    <td>{{ $item->content_handle }}</td>


                                                    <td>
                                                        @if ($item->status == 'received')
                                                            <a
                                                                href="{{ route('dashboard.feedback.edit_feedback', $item->id) }}"><button>Processing</button></a>
                                                            <a href="{{ asset('dashboard/feedback/delete/' . $item->id) }}">
                                                                <button>Delete</button></a>
                                                        @endif

                                                        @if ($item->status == 'pending')
                                                            <a
                                                                href="{{ route('dashboard.feedback.complete_processing', $item->id) }}"><button>Completed</button></a>
                                                            <a
                                                                href="{{ asset('dashboard/feedback/delete/' . $item->id) }}">
                                                                <button>Delete</button></a>
                                                        @endif
                                                        @if ($item->status == 'completed')
                                                            <a
                                                                href="{{ asset('dashboard/feedback/delete/' . $item->id) }}">
                                                                <button>Delete</button></a>
                                                        @endif

                                                    </td>
                                                </tr>
                                                @endforeach
                                                </tbody>

                                            </table>
                                            {{ $data2->links() }}

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
