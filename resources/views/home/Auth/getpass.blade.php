<!DOCTYPE html>
<html lang="en">

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
    <style>
        body {
            background-image: url('img/netflix.png');
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>

</head>

<body>
    <div class="loader-wrapper">
        <div class="theme-loader">
            <div class="loader-p"></div>
        </div>
    </div>
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12 p-0">
                    <div class="login-card">
                        <form id="reset_Password" class="theme-form login-form" method="POST"
                            action="{{ route('getpassPost', ['user' => $user->id, 'token' => $token]) }}">
                            @csrf
                            <h4>reset Password</h4>
                            <div class="form-group">
                                <label>New Password:</label>
                                <div class="input-group"><span class="input-group-text"><i class="icon-lock"></i></span>
                                    <input class="form-control" type="password" id="password" name="password"
                                        required="" placeholder="your Email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Confirm New Password:</label>
                                <div class="input-group"><span class="input-group-text"><i class="icon-lock"></i></span>
                                    <input class="form-control" type="password" name="password_confirmation"
                                        id="password_confirmation" required="" placeholder="Re-enter email">
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-block" type="submit">Reset Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('layouts.dashboard.partials.js')

    <script>
        $(document).ready(function() {
            // Xử lý đăng nhập
            $("#reset_Password").ajaxForm({
                dataType: 'json',
                url: '{{ route('getpassPost', ['user' => $user->id, 'token' => $token]) }}',
                beforeSend: function() {
                    Swal.showLoading()
                },
                success: function(data) {
                    if (data.status == 0) {
                        $("#reset_Password").resetForm();
                        Swal.fire({
                                title: "Finished!",
                                text: data.message,
                                type: "success",
                                confirmButtonClass: 'btn-success',
                                confirmButtonText: 'OK'
                            })
                            .then((result) => {
                                if (result.value) {
                                    window.location.assign('/login');
                                }
                            });
                    } else {
                        Swal.fire({
                            title: "Error!",
                            text: data.message,
                            type: "error",
                            confirmButtonClass: 'btn-danger',
                            confirmButtonText: 'OK'
                        });
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    Swal.fire({
                        title: "Error!",
                        text: "There was an error in the execution!",
                        type: "error",
                        confirmButtonClass: 'btn-danger',
                        confirmButtonText: 'OK'
                    });
                }
            });
        });
    </script>

</body>

</html>
