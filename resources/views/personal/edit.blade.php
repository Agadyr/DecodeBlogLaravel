<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <base href="{{asset('/')}}">
{{--    <link href="{{asset('css/all.css')}}">--}}
    <link rel="stylesheet" href="../../css/all.css">
</head>
<body>
@include('personal.includes.header')
<div class="plr4 df jcsb g3 create-post">
    <div class="post-cards">
            <h1 style="padding: 0!important;text-align: left">Новый блог</h1>
        <form>
            <input placeholder="Введите заголовок блога">
            <select id="category">
                <option value="Выберите Категорию" selected disabled>Выберите категорию</option>
                <option value="Коты">Коты</option>
                <option value="Собаки">Собаки</option>
                <option value="Мышки">Мышки</option>
            </select>
            <input type="file">
            <textarea placeholder="Введите описание блога"></textarea>
            <button type="submit">Создать</button>
        </form>
    </div>
</div>
</body>
</html>
