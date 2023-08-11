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
    <title>Registration</title>
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

<body>
    <div class="loader-wrapper">
        <div class="theme-loader">
            <div class="loader-p"></div>
        </div>
    </div>
    <section>
        <div class="container-fluid p-0">
            <div class="row m-0">
                <div class="col-12 p-0">
                    <div class="login-card">
                        <form id="Registration" class="theme-form login-form" action="{{ route('RegisterPost') }}"
                            method="POST">
                            @csrf
                            <h4>Create your account</h4>
                            <h6>Enter your personal details to create account</h6>
                            <div class="form-group">
                                <label>Your Name</label>
                                <div class="small-group">
                                    <div class="input-group"><span class="input-group-text"><i
                                                class="icon-user"></i></span>
                                        <input class="form-control" type="text" required=""
                                            placeholder="Fist Name" name="name" id="name">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Email Address</label>
                                <div class="input-group"><span class="input-group-text"><i
                                            class="icon-email"></i></span>
                                    <input class="form-control" type="email" required=""
                                        placeholder="Test@gmail.com" name="email" id="email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <div class="input-group"><span class="input-group-text"><i class="icon-lock"></i></span>
                                    <input class="form-control" type="password" id="password" name="password"
                                        required="" placeholder="*********" value="Aq111111">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Confirm password</label>
                                <div class="input-group"><span class="input-group-text"><i class="icon-lock"></i></span>
                                    <input class="form-control" type="password" name="password_confirmation"
                                        id="password_confirmation" required="" placeholder="*********" value="Aq111111">
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-block" type="submit">Create Account</button>
                            </div>
                            <p>Already have an account?<a class="ms-2" href="{{ route('login') }}">Sign in</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('layouts.dashboard.partials.js')

    <script>
        function check() {
            var isCheckOK = true;

            var email = document.getElementById("email").value;
            var patternEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,})+$/;

            if (!patternEmail.test(email)) {
                Swal.fire({
                    title: "Error",
                    text: "Invalid email!",
                    type: "error"
                });
                isCheckOK = false;
            }

            var password = document.getElementById("password").value;
            var uppercaseRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{6,}$/;

            if (!(password.length >= 8 && uppercaseRegex.test(password))) {
                Swal.fire({
                    title: "Error",
                    text: "Need 8 characters and 1 uppercase letter and number!",
                    type: "error"
                });
                isCheckOK = false;
            }

            return isCheckOK;
        }

        function check() {
            var isCheckOK = true;
            var name = document.getElementById("name").value;
            var patternName = /^(?=[a-zA-Z]{3,}$)[a-zA-Z]+(null|\s*)$/;

            if (!(name.length >= 3 && patternName.test(name))) {
                Swal.fire({
                    title: "Error",
                    text: "at least 3 characters and no numbers, special characters!",
                    type: "error"
                });
                isCheckOK = false;
            }

            var email = document.getElementById("email").value;
            var patternEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,})+$/;

            if (!patternEmail.test(email)) {
                Swal.fire({
                    title: "Error",
                    text: "Invalid email!",
                    type: "error"
                });
                isCheckOK = false;
            }

            var password = document.getElementById("password").value;
            var uppercaseRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{6,}$/;

            if (!(password.length >= 8 && uppercaseRegex.test(password))) {
                Swal.fire({
                    title: "Error",
                    text: "need 8 characters and 1 uppercase letter and number!",
                    type: "error"
                });
                isCheckOK = false;
            }

            var retypePassword = document.getElementById("password_confirmation").value;

            if (password !== retypePassword) {
                Swal.fire({
                    title: "Error",
                    text: "Password incorrect!",
                    type: "error"
                });
                isCheckOK = false;
            }

            return isCheckOK;
        }
        $(document).ready(function() {
            // Xử lý đăng nhập
            $("#Registration").ajaxForm({
                dataType: 'json',
                url: '{{ route('RegisterPost') }}',
                beforeSend: function() {
                    isCheckOK = check();
                    if (isCheckOK == false) {
                        return false;
                    }
                },
                success: function(data) {
                    if (data.status == 0) {
                        $("#Registration").resetForm();
                        Swal.fire({
                            title: "finished!",
                            text: data.message,
                            type: "success",
                            confirmButtonClass: 'btn-success',
                            confirmButtonText: 'OK'
                        }).then((result) => {
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
