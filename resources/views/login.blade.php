<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login</title>
</head>

<body>
    @if (session('msg'))
        {{ session('msg') }}
    @endif
    <form action="{{ route('auth.login') }}" method="post">
        @csrf
        @method('post')
        <input type="text" name="email_username" placeholder="Enter Email or Username">
        <input type="password" name="password" placeholder="Enter Password">
        <button type="submit">Login</button>
    </form>
    <a href="{{ route('auth.register') }}">register</a>
</body>

</html>
