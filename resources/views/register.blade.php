<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>register</title>
</head>
<body>
    @foreach ($errors->all() as $item)
        {{ $item }}<br>
    @endforeach
    <form action="{{ route('auth.do_register') }}" method="post">
        @csrf
        <input type="text" name="username" placeholder="create username">
        <input type="email" name="email" placeholder="create email">
        <input type="password" name="password" placeholder="create password">
        <button type="submit">submit</button>
    </form>
</body>
</html>