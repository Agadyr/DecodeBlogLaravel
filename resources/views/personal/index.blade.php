<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{asset('css/all.css')}}">
    <link rel="stylesheet" href="../../css/all.css">
</head>
<body>
@include('includes.header')
<div class="plr4 df jcsb g3">
    <div class="post-cards">
        <div class="My-blogs df jcsb aic" style="margin: 20px 0">
            <h1 style="padding: 0!important;">Мои блоги</h1>
            <a href="{{route('personal.post.create')}}" class="button-primary">Новый блог</a>
        </div>
        @if(count($posts) == 0)
            <h1 style="font-size: 20px;text-align: left">Создайте свой первый Пост</h1>
        @endif
        @foreach($posts as $post)

            <div>


                <img class="post-img pt1" src="{{asset('storage/'.$post->image)}}" style="width: 100%;height: 300px;object-fit: contain;">
                <div class="settings df jcsb aic">
                    <h2 class="title">{{$post->title}}</h2>
                    <div class="df jcsb aic g2 more-icon">
                        <img src="{{url('images/morevertical.svg')}}" style="cursor:pointer;"
                             onclick="ToggleMenu(this)">
                        <p>Еще</p>
                        <div class="more-card g3">
                            <button style="color: black;font-weight: 500;">Редактировать{{$post->id}}</button>
                            <button style="color: red;font-weight: 500;">Удалить</button>
                        </div>
                    </div>

                </div>

                <p class="description">{{$post->content}}</p>
                <div class="about-post df jcsb aic">
                    <div class="calendar df jcsb aic g3">
                        <img src="{{asset('/images/calendar.svg')}}">
                            <h3>{{$post->created_at->month}}.{{$post->created_at->day}}.{{$post->created_at->year}}</h3>
                    </div>
                    <div class="eye df jcsb aic g3">
                        <img src="{{asset('/images/eye.svg')}}">
                        <h3>21</h3>
                    </div>
                    <div class="comment df jcsb aic g3">
                        <img src="{{asset('/images/comment.svg')}}">
                        <h3>4</h3>
                    </div>
                    <div class="fill df jcsb aic g3">
                        <img src="{{asset('/images/fill.svg')}}">
                        <h3>
                            {{$post->category->title}}
                        </h3>
                    </div>
                    <div class="usersShow df jcsb aic g3">
                        <img src="{{asset('/images/Vector.svg')}}">
                        <h3>{{auth()->user()->name}}</h3>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="category-cards" style="text-align: center">
        <img class="ptb2" style="width: 200px;height: 200px" src="{{asset('/images/ava.png')}}">
        <h2>{{auth()->user()->name}}</h2>
        <p class="ptb2">В основно пишу про веб разработку React & Redux</p>
        <p>285 постов за все время</p>
        <div class="df flex-d aic">
            <button class="button-primary mt2 mb1" style="padding: 14px 17px!important;">Редактировать</button>
            <form action="{{route('logout')}}" method="post">
                @csrf
                <button type="submit" class="button-primary "
                        style="padding: 14px 17px!important;background-color: red;margin-bottom: 20px">Выйти
                </button>
            </form>
        </div>

    </div>
</div>
<script>

    function ToggleMenu(icon) {
        let drop1 = icon.nextElementSibling.nextElementSibling;
        if (drop1.style.display === 'none' || drop1.style.display === '') {
            drop1.style.display = 'block';
        } else {
            drop1.style.display = 'none';
        }
    }
</script>
</body>
</html>
