<h1>Password Reset</h1>
<p>Hello {{ $user->name }},</p>
<p>We received a request to reset your password for your account.</p>
<p>If you didn't make this request, you can ignore this email. Your password will remain unchanged.</p>
<p>To reset your password, please click the following link:</p>
<a href="{{ route('getpass', ['user' => $user->id, 'token' => $passwordResetToken->token]) }}">Reset Password</a>
<p>Thank you,</p>
<p>The acedia Team</p>
