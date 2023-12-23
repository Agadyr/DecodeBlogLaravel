<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <base href="/">
    <link rel="stylesheet" href="../../css/all.css">
</head>
<body>
@include('auth.includes.header')
<div class="register">
    <form class="register-form" action="{{route("register.store")}}" method="post" novalidate>
        @csrf
        <h1>Регистрация</h1>
        <input class="{{$errors->has('email') ? 'input-red':'input-reg'}}"  name="email" placeholder="Введите email">
        @error('email')
        <p class="error">{{$message}}</p>
        @enderror
        <input class="{{$errors->has('name') ? 'input-red':'input-reg'}}" name="name" placeholder="Введите полное имя">
        @error('name')
        <p class="error">{{$message}}</p>
        @enderror
        <input class="{{$errors->has('password') ? "input-red":"input-reg"}}" name="password" placeholder="Введите пароль">
        @error('password')
        <p class="error">{{$message}}</p>
        @enderror
        <input class="{{$errors->has('password_confirmation') ? 'input-red' : 'input-reg'}}" name="password_confirmation" placeholder="Потвердите пароль">
        @error('password_confirmation')
        <p class="error">{{$message}}</p>
        @enderror
        <button type="submit" class="button-primary mtb2" style="width: 100%">Зарегистрироваться</button>

    </form>
</div>

</body>
</html>
