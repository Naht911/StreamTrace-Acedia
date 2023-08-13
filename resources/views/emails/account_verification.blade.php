<h1>hi {{ $user->name }}</h1>
<p>verification email</p>
<a href="{{ route('actived', ['user' => $user->id, 'token' => $user->verify_token]) }}">actived Email</a>
