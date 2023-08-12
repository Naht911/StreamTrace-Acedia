<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
    integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
</script>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="viho admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, viho admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="../assets/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="../assets/images/favicon.png" type="image/x-icon">
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">
    @include('layouts.dashboard.partials.css')

</head>

<div style="text-align: center; display: flex; justify-content: center; margin-top:100px ">
    <div style="width: 80%; padding: 30px ; border: 1px solid;  ">
        <h2>feedback</h2>
        @if (Session::has('alert'))
            <div class="alert alert-success">
                {{ Session::get('alert') }}
            </div>
        @endif
        <form action="{{ route('create_feedback') }}" method="POST" enctype="multipart/form-data" id="myForm">
            @csrf

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email:</label>
                <input type="email" class="form-control" name="email" id="email">
                <div id="emailHelp" class="form-text">Input your email, please!!</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Title:</label>
                <input type="text" class="form-control" name="title" id="title">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Content:</label>
                <input type="text" class="form-control" name="content" id="content">
            </div>


            {{-- <div class="mb-3 form-check">
            <input type="checkbox" name="buttoncheck" class="form-check-input" id="myCheckbox">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div> --}}
            <button type="submit" class="btn btn-primary" id="submit" onclick="checkSubmit()">Submit</button>

        </form>
    </div>
</div>
<script>
    // function checkSubmit() {
    //     if (content == '') {
    //         alert('khong trong');
    //     }
    // }

    function checkSubmit() {
        var content = document.getElementById('content').value;
        var title = document.getElementById('title').value;
        var user = document.getElementById('content').value;
        if (content === '' || title === '' || user === '') {
            alert('Không được để trống nội dung');
            return false; // Chặn việc gửi form nếu nội dung rỗng
        }
        return true; // Gửi form nếu nội dung không rỗng
    }
</script>
@include('layouts.dashboard.partials.js')
