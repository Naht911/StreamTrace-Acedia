@extends('layouts.home.home_layout')
@section('title', 'My Wtachlist')
@push('css')
    <style>
        #profile {
            height: 100%;
        }
    </style>
@endpush


@section('content')
    <!-- SETTING -->
    <div class="setting-account full-height" id="profile">
        <div class="container wrapper">
            <header>Personal page</header>
            <input type="radio" name="slider" checked id="setting-1" />
            <input type="radio" name="slider" id="setting-2" />
            <input type="radio" name="slider" id="setting-3" />
            <nav class="mb-2">
                <label for="setting-1" class="setting-1">Accounts and Settings</label>
                <label for="setting-2" class="setting-2">Service purchased</label>
                <!-- <div class="slider"></div> -->
            </nav>
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="setting">

                <div class="content content-1">
                    <div class="content-1-1">
                        <div class="title">Account information</div>
                        <div class="content-1-2">
                            <div class="content-setting">
                                <div class="content-acc">
                                    <div class="title">User Name:</div>
                                    <span>{{ $user->name }}</span>
                                </div>
                                <div class="setting-acc show-modal-name" onclick="toggleName()">Change</div>
                            </div>

                            <div class="content-setting">
                                <div class="content-acc">
                                    <div class="title">Email:</div>
                                    <span> {{ $user->email }}</span>
                                </div>
                            </div>

                            <div class="content-setting">
                                <div class="content-acc">
                                    <div class="title">Password:</div>
                                    <span class="setting-acc" onclick="togglePassword()">Change your Password</span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="content content-2">
                    <button class="create">Create</button>
                    <div class="content-1-1-2">
                        <table>
                            <tr>
                                <th>STT</th>
                                <th>Name</th>
                                <th>Logo</th>
                                <th>Subscription URL</th>
                                <th>Renewal date</th>
                                <th>Amount</th>
                                <th>Action</th>
                            </tr>
                            <tr>
                                <td>01</td>
                                <td>bc</td>
                                <td>Netflix</td>
                                <td>https/...com</td>
                                <td>21:21:31 - 19/07/2023</td>
                                <td>3$</td>
                                <td>
                                    <div>
                                        <button class="edit">Edit</button>
                                        <button class="delete">Delete</button>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div id="popup-setting-create" class="content-1-1-3">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" />
                        </div>
                        <div class="form-group">
                            <label for="">Logo</label>
                            <input type="text" />
                        </div>
                        <div class="form-group">
                            <label for="">Subscription URL </label>
                            <input type="text" />
                        </div>
                        <div class="form-group">
                            <label for="">Renewal date</label>
                            <input type="datetime-local" />
                        </div>
                        <div class="form-group">
                            <label for="">Amount</label>
                            <input type="text" />
                        </div>
                        <div class="form-group">
                            <button class="create">Create</button>
                        </div>
                        <div class="form-group">
                            <button class="update">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- SETTING --end -->

    <!-- MODAL -->
    <div id="popup-setting-name">
        <h2>Update name</h2>
        <form method="POST" action="{{ route('change-name') }}">
            @csrf
            <div class="form-group">
                <input type="text" id="new_name" name="new_name" value="{{ Auth::user()->name }}" required />
                <label for="username" class="form-label">Name</label>
            </div>
            <div class="button-movie">
                <button type="submit" class="button">Save</button>
                <button type="button" class="button" onclick="toggleName()">Skip</button>
            </div>
        </form>
    </div>

    <div id="popup-setting-password">
        <h2>Change password</h2>
        <form id="changePasswordForm" action="{{ route('change-password') }}" method="POST">
            @csrf
            <div class="form-group">
                <input id="current_password" name="current_password" type="password" class="form-control" required />
                <label for="current_password" class="form-label">Current Password</label>
                <div class="error-message" style="color: red;" id="current_password_error"></div>
            </div>
            <div class="form-group">
                <input id="new_password" name="new_password" type="password" class="form-control" required />
                <label for="new_password" class="form-label">New Password</label>
                <div class="error-message" style="color: red;" id="new_password_error"></div>
            </div>
            <div class="form-group">
                <input id="confirm_new_password" name="confirm_new_password" type="password" class="form-control"
                    required />
                <label for="confirm_new_password" class="form-label">Confirm New Password</label>
                <div class="error-message" style="color: red;" id="confirm_new_password_error"></div>
            </div>
            <div class="button-movie">
                <button class="button" id="passwordButton">Save</button>
                <button class="button" onclick="togglePassword()">Skip</button>
            </div>
        </form>
    </div>
    <div id="popup-setting-info">
        <h2>Chỉnh sửa thông tin</h2>
        <div class="setting-info">
            <button onclick="defaultBtnActive()" id="custom-btn">
                <div class="setting-content">
                    <div class="image">
                        <img src="img/img-cast/jisoo-blackpink.jfif" alt="" />
                    </div>
                    <div class="content">
                        <div class="text">No file chosen, yet!</div>
                    </div>
                    <div id="cancel-btn">
                        <i class="fas fa-times"></i>
                    </div>
                    <div class="file-name"></div>
                </div>
            </button>
            <input id="default-btn" type="file" hidden />
        </div>
        <div class="button-movie">
            <button class="button">Save</button>
            <button class="button" onclick="toggleInfo()">Skip</button>
        </div>
    </div>

    <div id="popup-setting-search">
        <h2>Are you sure you want to clear your search history?</h2>
        <div class="button-movie">
            <button class="button">Save</button>
            <button class="button" onclick="togglenotifSearch()">Skip</button>
        </div>
    </div>


@endsection

<!-- Container-fluid Ends-->
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const currentPasswordInput = document.getElementById('current_password');
            const newPasswordInput = document.getElementById('new_password');
            const confirmNewPasswordInput = document.getElementById('confirm_new_password');

            currentPasswordInput.addEventListener('blur', validateCurrentPassword);
            newPasswordInput.addEventListener('blur', validateNewPassword);
            confirmNewPasswordInput.addEventListener('blur', validateConfirmNewPassword);

            function validateCurrentPassword() {
                // Kiểm tra và hiển thị thông báo lỗi cho current_password
                const currentPassword = currentPasswordInput.value.trim();
                const currentPasswordError = document.getElementById('current_password_error');

                currentPasswordError.textContent = '';

                if (currentPassword === "") {
                    currentPasswordError.textContent = "Please enter your current password.";
                    return false;
                }

                // Thêm các kiểm tra khác cho current_password nếu cần

                return true;
            }

            function validateNewPassword() {
                // Kiểm tra và hiển thị thông báo lỗi cho new_password
                const newPassword = newPasswordInput.value.trim();
                const newPasswordError = document.getElementById('new_password_error');

                newPasswordError.textContent = '';

                var uppercaseRegex = /[A-Z]/;
                var lowercaseRegex = /[a-z]/;
                var digitRegex = /[0-9]/;

                if (newPassword.trim() === "") {
                    newPasswordError.textContent = "Please enter a new password.";
                    return false;
                } else if (!uppercaseRegex.test(newPassword)) {
                    newPasswordError.textContent = "New password must contain at least one uppercase letter.";
                    return false;
                } else if (!lowercaseRegex.test(newPassword)) {
                    newPasswordError.textContent = "New password must contain at least one lowercase letter.";
                    return false;
                } else if (!digitRegex.test(newPassword)) {
                    newPasswordError.textContent = "New password must contain at least one digit.";
                    return false;
                } else if (newPassword.length < 8) {
                    newPasswordError.textContent = "Password must be at least 8 characters long.";
                    return false;
                }

                // Thêm các kiểm tra khác cho new_password nếu cần

                return true;
            }

            function validateConfirmNewPassword() {
                // Kiểm tra và hiển thị thông báo lỗi cho confirm_new_password
                const confirmNewPasswordInput = document.getElementById('confirm_new_password');
                const confirmNewPasswordError = document.getElementById('confirm_new_password_error');
                const newPasswordInput = document.getElementById('new_password');
                const newPassword = newPasswordInput.value.trim();

                confirmNewPasswordError.textContent = '';

                const confirmNewPassword = confirmNewPasswordInput.value.trim();

                if (confirmNewPassword === "") {
                    confirmNewPasswordError.textContent = "Please confirm your new password.";
                    return false;
                }

                if (confirmNewPassword !== newPassword) {
                    confirmNewPasswordError.textContent = "Confirmed password does not match new password.";
                    return false;
                }

                var uppercaseRegex = /[A-Z]/;
                var lowercaseRegex = /[a-z]/;
                var digitRegex = /[0-9]/;

                if (!uppercaseRegex.test(newPassword)) {
                    confirmNewPasswordError.textContent =
                        "New password must contain at least one uppercase letter.";
                    return false;
                }

                if (!lowercaseRegex.test(newPassword)) {
                    confirmNewPasswordError.textContent =
                        "New password must contain at least one lowercase letter.";
                    return false;
                }

                if (!digitRegex.test(newPassword)) {
                    confirmNewPasswordError.textContent = "New password must contain at least one digit.";
                    return false;
                }

                return true;
            }
        });

        function toggleName() {
            var toggleName = document.getElementById('popup-setting-name');
            toggleName.classList.toggle('active');
        }

        function togglePassword() {
            var togglePassword = document.getElementById('popup-setting-password');
            togglePassword.classList.toggle('active');
        }

        function toggleGender() {
            var toggleGender = document.getElementById('popup-setting-gender');
            toggleGender.classList.toggle('active');
        }

        function toggleInfo() {
            var toggleInfo = document.getElementById('popup-setting-info');
            toggleInfo.classList.toggle('active');
        }

        const wrapper = document.querySelector('.setting-content');
        const fileName = document.querySelector('.file-name');
        const defaultBtn = document.querySelector('#default-btn');
        const customBtn = document.querySelector('#custom-btn');
        const cancelBtn = document.querySelector('#cancel-btn i');
        const img = document.querySelector('.setting-content img');

        function defaultBtnActive() {
            defaultBtn.click();
        }
        defaultBtn.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function() {
                    const result = reader.result;
                    img.src = result;
                    wrapper.classList.add('active');
                };
                cancelBtn.addEventListener('click', function() {
                    img.src = '';
                    wrapper.classList.remove('active');
                });
                reader.readAsDataURL(file);
            }
        });

        function toggleNotif() {
            const notif1 = document.getElementsByClassName('setting-acc notif')[0];
            const notif2 = document.querySelector('.content-acc .span-notif'); // Use querySelector to select by class name

            if (notif1.classList.contains('active')) {
                notif1.classList.remove('active');
                notif1.innerText = 'Off';
                notif2.innerText = 'Yes';
            } else {
                notif1.classList.add('active');
                notif1.innerText = 'On';
                notif2.innerText = 'No';
            }
        }

        function togglenotifSearch() {
            var togglenotifSearch = document.getElementById('popup-setting-search');
            togglenotifSearch.classList.toggle('active');
        }

        function toggleDetail() {
            var popupDetail = document.getElementById('popup-chitiet');
            popupDetail.classList.toggle('active');
        }
    </script>
@endpush
