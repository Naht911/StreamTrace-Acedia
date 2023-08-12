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
        <div class="container-fluid p-0">
            <div class="row m-0">
                <div class="col-12 p-0">
                    <div class="login-card">
                        <form id="Registration" class="theme-form login-form" action="{{ route('register.process') }}"
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
                                <span id="nameError" class="error-message" style="color: red; font-size: 10px"></span>
                            </div>
                            <div class="form-group">
                                <label>Email Address</label>
                                <div class="input-group"><span class="input-group-text"><i
                                            class="icon-email"></i></span>
                                    <input class="form-control" type="email" required=""
                                        placeholder="Test@gmail.com" name="email" id="email">
                                </div>
                                <span id="emailError" class="error-message" style="color: red; font-size: 10px"></span>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="icon-lock"></i></span>
                                    <input class="form-control" type="password" id="password" name="password"
                                        required="" placeholder="password">
                                    <span class="input-group-text" id="toggleIconPassword"
                                        onclick="togglePasswordVisibility('password')">
                                        <i class="fas fa-eye"></i>
                                    </span>
                                </div>
                                <span id="passwordError" class="error-message"
                                    style="color: red; font-size: 10px"></span>
                            </div>
                            <div class="form-group">
                                <label>Confirm password</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="icon-lock"></i></span>
                                    <input class="form-control" type="password" name="password_confirmation"
                                        id="password_confirmation" required="" placeholder="password confirmation"
                                        value="">
                                    <span class="input-group-text" id="toggleIconConfirmation"
                                        onclick="togglePasswordVisibility('password_confirmation')">
                                        <i class="fas fa-eye"></i>
                                    </span>
                                </div>
                                <span id="passwordConfirmation" class="error-message"
                                    style="color: red; font-size: 10px"></span>
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
        function togglePasswordVisibility(inputId) {
            var passwordInput = document.getElementById(inputId);

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
            } else {
                passwordInput.type = "password";
            }
        }
        const nameInput = document.getElementById('name')
        const emailInput = document.getElementById('email')
        const passwordInput = document.getElementById('password')
        const passwordConfirmationInput = document.getElementById('password_confirmation')


        nameInput.addEventListener('blur', validateName);
        passwordInput.addEventListener('blur', validatePassword);
        emailInput.addEventListener('blur', validateEmail);
        passwordConfirmationInput.addEventListener('blur', validatePasswordConfirmation);

        function validateName() {
            const name = nameInput.value;
            const nameError = document.getElementById('nameError');
            nameError.textContent = '';

            if (name.trim() === "") {
                document.getElementById("nameError").textContent = "Please enter your name.";
                return false;
            } else {
                document.getElementById("nameError").textContent = "";
                return true;
            }
        }

        function validateEmail() {
            const email = emailInput.value;
            const emailError = document.getElementById('emailError');
            emailError.textContent = '';

            const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

            if (email.trim() === "") {
                emailError.textContent = "Please enter an email address.";
                return false;
            }

            if (!emailRegex.test(email)) {
                emailError.textContent = "Please enter a valid email address.";
                return false;
            }

            if (email.endsWith(".com")) {
                const parts = email.split(".");
                const domain = parts[parts.length - 2];

                if (domain === "com") {
                    emailError.textContent = "Email address has an invalid .com domain.";
                    return false;
                }

                if (/^\d+$/.test(domain)) {
                    emailError.textContent = "Email address has an invalid .com domain.";
                    return false;
                }
            }

            emailError.textContent = "";
            return true;
        }

        function validatePassword() {
            const password = passwordInput.value;
            const passwordError = document.getElementById('passwordError');

            passwordError.textContent = '';

            var uppercaseRegex = /[A-Z]/;
            var lowercaseRegex = /[a-z]/;
            var digitRegex = /[0-9]/;

            if (password.trim() === "") {
                passwordError.textContent = "Please enter a password.";
                return false;
            } else if (!uppercaseRegex.test(password)) {
                passwordError.textContent =
                    "one uppercase letter.";
                return false;
            } else if (!digitRegex.test(password)) {
                passwordError.textContent =
                    "one digit.";
                return false;
            } else if (!lowercaseRegex.test(password)) {
                passwordError.textContent =
                    "one lowercase letter.";
                return false;
            } else if (password.length < 8) {
                passwordError.textContent = "Password must be at least 8 characters long.";
                return false;
            } else {
                passwordError.textContent = "";
                return true;
            }
        }

        function validatePasswordConfirmation() {
            const password = document.getElementById("password").value;
            const passwordConfirmation = document.getElementById("password_confirmation").value;
            const passwordConfirmationError = document.getElementById("passwordConfirmation");
            passwordConfirmationError.textContent = '';

            if (passwordConfirmation.trim() === "") {
                passwordConfirmationError.textContent = "Please enter the password confirmation.";
                return false;
            } else if (password !== passwordConfirmation) {
                passwordConfirmationError.textContent = "Passwords do not match.";
                return false;
            }

            passwordConfirmationError.textContent = "";
            return true;
        }
        $(document).ready(function() {
            // Xử lý đăng nhập
            $("#Registration").ajaxForm({
                dataType: 'json',
                url: '{{ route('register.process') }}',
                beforeSend: function() {
                    Swal.showLoading()
                },
                success: function(data) {
                    if (data.status == 0) {
                        $("#Registration").resetForm();
                        Swal.fire({
                            title: "Finished!",
                            text: data.message,
                            type: "success",
                            confirmButtonClass: 'btn-success',
                            confirmButtonText: 'OK'
                        }).then((result) => {
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
