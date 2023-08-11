@extends('layouts.dashboard.dashboard_layout')
@section('title', 'Lisy Movie')


@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/animate.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/sweetalert2.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/select2.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
</script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">

@endpush
@section('content')
@yield('breadcrumb-list')

<div class="container-fluid dashboard-default-sec">
    <div class="row">
        <div class="col-xl-12 box-col-12 des-xl-100 top-dealer-sec">
            <style>
                .datepicker table tr td span.year {
                    display: block;
                    width: 25%;
                    height: 40px;
                    line-height: 40px;
                    float: left;
                    margin: 4%;
                    cursor: pointer;
                    -webkit-border-radius: 4px;
                    -moz-border-radius: 4px;
                    border-radius: 4px;
                }

                .datepicker table tr td {
                    width: 300px;
                }
            </style>
            <form id="formId" method="get" class="input-group">
                <span class="input-group-text">Year</span>
                <input type="text" class="form-control" value=" <?php echo $_GET['year']; ?>" name="year" id="datepicker" onChange="form.submit()" />
                <button type="submit">Submit</button>
            </form>

            <table class="table table-striped table-responsive">
                <thead class="thead-inverse">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Register At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $data)
                    <tr>
                        <td scope="row">{{ $data->id }}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->email }}</td>
                        <td>{{ $data->created_at->format('M Y') }}</td>
                        <td>
                            <button class="btn"><a href="{{ asset('dashboard/feedback/edit/' . $data->id) }}">Processing</a></button>
                            <button class="btn"> <a href="{{ asset('dashboard/feedback/delete/' . $data->id) }}">Delete</a></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
            
        <div id="chart-container">
            <canvas id="graph"></canvas>
        </div>
        
    </div>
</div>




@endsection

<!-- Container-fluid Ends-->
@push('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="https://netdna.bootstrapcdn.com/bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.3.3/chart.min.js" integrity="sha512-fMPPLjF/Xr7Ga0679WgtqoSyfUoQgdt8IIxJymStR5zV3Fyb6B3u/8DcaZ6R6sXexk5Z64bCgo2TYyn760EdcQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    $("#datepicker").datepicker({
        format: "yyyy",
        viewMode: "years",
        minViewMode: "years",
        autoclose: true //to close picker once year is selected
    });
</script>
<script type="text/javascript">
  
      var count = '{!! $count !!}';

      console.log( count)
  
      const data = {
        labels: labels,
        datasets: [{
          label: 'My First dataset',
          backgroundColor: 'rgb(255, 99, 132)',
          borderColor: 'rgb(255, 99, 132)',
          data: count,
        }]
      };
  
      const config = {
        type: 'line',
        data: data,
        options: {}
      };
  
      const myChart = new Chart(
        document.getElementById('myChart'),
        config
      );
  
</script>
@endpush