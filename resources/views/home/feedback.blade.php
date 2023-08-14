@extends('layouts.home.home_layout')
@section('title', 'My feedback')
@push('css')
    <style>

    </style>
@endpush


@section('content')
    <form action="{{ route('create_feedback') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="main-detail">
            <div class="row-top">
                <div class="container">
                    <li><a href="home.html">Acedia</a></li>
                    <li>Feedback</li>
                </div>
            </div>
            <div class="row-center">
                <div class="container">
                    <h1>Your Feedback</h1>
                    <h4>
                        feedback is the place to solve your problems or your reviews with us!!
                    </h4>
                </div>
            </div>
            <div class="row-bottom">
                <div class="container">
                    @if (!Auth::check())
                        <div class="form-group">
                            <label for="">Your email address </label>
                            <input class="form-control" type="email" name="email" id="email" required=""
                                placeholder="your Email">
                            <span id="emailError" class="error-message" style="color: red; font-size: 17px"></span>
                        </div>
                    @else
                        {{-- <div class="form-group">
                            <label for="">Your email address </label>
                            <input class="form-control" type="email" name="email" id="email" required=""
                                placeholder="your Email" value="{{Auth::}}">
                            <span id="emailError" class="error-message" style="color: red; font-size: 17px"></span>
                        </div> --}}
                    @endif

                    <div class="form-group">
                        <label for="">Subject </label>
                        <input type="text" name="title" id="subject" />
                        <span id="subjectError" class="error-message" style="color: red; font-size: 17px"></span>

                    </div>
                    <div class="form-group">
                        <label for="">Description </label>
                        <textarea id="" cols="30" rows="10" name="content" id="description"></textarea>
                    </div>
                    <button>Submit</button>
                </div>
            </div>
        </div>
    </form>
    <script>
        const emailInput = document.getElementById('email');
        emailInput.addEventListener('blur', validateEmail);

        function isValidEmail(email) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        }

        function validateEmail() {
            const email = emailInput.value;
            const emailError = document.getElementById('emailError');
            emailError.textContent = '';

            if (!isValidEmail(email)) {
                emailError.textContent = 'Invalid email format.';
            }
        }

        let subjectInput = document.getElementById('subject')
        subject.addEventListener('blur', validateTitle);

        function validateTitle() {
            let subject = subjectInput.value;
            let subjectError = document.getElementById('subjectError');
            if (subject == '') {
                subjectError.textContent = 'do not leave blank.';
            }
        }
    </script>

@endsection

<!-- Container-fluid Ends-->
@push('scripts')
@endpush
