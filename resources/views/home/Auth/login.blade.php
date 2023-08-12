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
                        <form id="Login" class="theme-form login-form" action="{{ route('login.process') }}"
                            method="POST">
                            @csrf
                            <h4>Login</h4>
                            <h6>Welcome back! Log in to your account.</h6>
                            <div class="form-group">
                                <label>Email Address</label>
                                <div class="input-group"><span class="input-group-text"><i
                                            class="icon-email"></i></span>
                                    <input class="form-control" type="email" name="email" id="email"
                                        required="" placeholder="your Email">
                                </div>
                                <span id="emailError" class="error-message" style="color: red; font-size: 10px"></span>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="icon-lock"></i>
                                    </span>
                                    <input class="form-control" type="password" name="password" id="password"
                                        required="" placeholder="password">
                                    <span class="input-group-text" id="toggleIcon" onclick="togglePasswordVisibility()">
                                        <i class="fas fa-eye"></i>
                                    </span>
                                </div>
                                <span id="passwordError" class="error-message"
                                    style="color: red; font-size: 10px"></span>
                            </div>
                            <div class="form-group">
                                <div class="checkbox">
                                    <input id="checkbox1" name="remember" type="checkbox"
                                        {{ old('remember') ? 'checked' : '' }}>
                                    <label class="text-muted" for="checkbox1">Remember password</label>
                                </div><a class="link" href="{{ route('forgotPassword') }}">Forgot password?</a>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-block inline-block" type="submit">Sign in</button>
                            </div>
                            <p>Don't have account?<a class="ms-2" href="{{ route('register') }}">Create
                                    Account</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('layouts.dashboard.partials.js')

    <script>
        function togglePasswordVisibility() {
            var passwordInput = document.getElementById("password");
            var toggleIcon = document.getElementById("toggleIcon");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                toggleIcon.innerHTML = '<i class="fas fa-eye-slash"></i>';
            } else {
                passwordInput.type = "password";
                toggleIcon.innerHTML = '<i class="fas fa-eye"></i>';
            }
        }

        const emailInput = document.getElementById('email');
        const passwordInput = document.getElementById('password');

        emailInput.addEventListener('blur', validateEmail);
        passwordInput.addEventListener('blur', validatePassword);

        function validateEmail() {
            const email = emailInput.value;
            const emailError = document.getElementById('emailError');
            emailError.textContent = '';

            if (!isValidEmail(email)) {
                emailError.textContent = 'Invalid email format.';
            }
        }

        function validatePassword() {
            const password = passwordInput.value;
            const passwordError = document.getElementById('passwordError');
            passwordError.textContent = '';

            if (!password) {
                passwordError.textContent = 'password required.';
            }
        }

        function isValidEmail(email) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        }

        $(document).ready(function() {
            // Xử lý đăng nhập
            $("#Login").ajaxForm({
                dataType: 'json',
                url: '{{ route('login.process') }}',
                beforeSend: function() {
                    Swal.showLoading()
                },
                success: function(data) {
                    if (data.status == 0) {
                        $("#Login").resetForm();
                        Swal.fire({
                                title: "Finished!",
                                text: data.message,
                                type: "success",
                                confirmButtonClass: 'btn-success',
                                confirmButtonText: 'OK'
                            })
                            .then((result) => {
                                if (result.value) {
                                    window.location.assign('/');
                                }
                            });
                    } else {
                        Swal.fire({
                            title: "Error!",
                            text: data.message,
                            type: "error",
                            confirmButtonClass: 'btn-danger',
                            confirmButtonText: 'OK'
                        })
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
