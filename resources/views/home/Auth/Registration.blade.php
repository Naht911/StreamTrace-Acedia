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
                        <form class="theme-form login-form" action="{{ route('RegisterPost') }}" method="POST">
                            @csrf
                            <h4>Create your account</h4>
                            <h6>Enter your personal details to create account</h6>
                            @if (Session::has('error'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('error') }}
                                </div>
                            @endif
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
                                    <input class="form-control" type="password" name="password" required=""
                                        placeholder="*********">
                                    <div class="show-hide"><span class="show"> </span></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Confirm password</label>
                                <div class="input-group"><span class="input-group-text"><i class="icon-lock"></i></span>
                                    <input class="form-control" type="password" name="password_confirmation" required=""
                                        placeholder="*********">
                                    <div class="show-hide"><span class="show"> </span></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="checkbox">
                                    <input id="checkbox1" type="checkbox">
                                    <label class="text-muted" for="checkbox1">Agree with <span>Privacy Policy
                                        </span></label>
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-block" type="submit">Create Account</button>
                            </div>
                            <p>Already have an account?<a class="ms-2" href="">Sign in</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('layouts.dashboard.partials.js')

</body>

</html>