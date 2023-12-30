<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <base href="{{asset('/')}}">
    <link rel="stylesheet" href="../../css/all.css">
</head>
<body>
@include('includes.header')
<div class="register" style="text-align: center">
    <div>
        <h1>Вход</h1>

        <form class="register-form" action="{{route("login.store")}}" method="post" novalidate>
            @csrf
            <div class="reg-div">
                <input class="{{$errors->has('email') ? 'input-red':'input-reg'}}" name="email" placeholder="Введите email"
                       value="{{old('email')}}">
                <i class="fa-regular fa-envelope {{$errors->has('email') ? 'icon-red' : 'icon-reg'}}"></i>
            </div>

            @error('email')
            <p class="error">{{$message}}</p>
            @enderror

            <div class="reg-div">
                <input type="password" class="{{$errors->has('password') ? "input-red":"input-reg"}}" name="password"
                       placeholder="Введите пароль">
                <i class="fa-solid fa-lock {{$errors->has('password') ? 'icon-red' : 'icon-reg'}}"></i>
            </div>

            @error('password')
            <p class="error">{{$message}}</p>
            @enderror

            <button type="submit" class="button-primary mtb2" style="width: 100%">Войти</button>


        </form>
        <a href="{{route('auth.github')}}">
            <img src="{{asset('images/github-mark.png')}}" style="width: 50px;text-align: center;margin: 12px 0">
            <h2 style="color: #1a202c">Login with GitHub</h2>
        </a>
    </div>
</div>

<script src="https://kit.fontawesome.com/46e5ccd8d3.js" crossorigin="anonymous"></script>
</body>
</html>
