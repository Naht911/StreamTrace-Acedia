<h1>Password Reset</h1>
<p>Hello {{ $user->name }},</p>
<p>We received a request to reset your password for your account.</p>
<p>If you didn't make this request, you can ignore this email. Your password will remain unchanged.</p>
<p>To reset your password, please click the following link:</p>
<a href="{{ route('resetPassword', ['user' => $user->id, 'token' => $passwordResetToken->token]) }}">Reset Password</a>
<p>Thank you,</p>
<p>The acedia Team</p>

<script>
    var arr = []; 

    $(document).ready(function() {
        $('#provider_country').on('change', function() {
            var ID = $(this).find(':selected').data('id');

            if (ID !== '' && arr.indexOf(ID) === -1) {
                arr.push(ID);
            }

            console.log(arr);

        });
    });
</script>
