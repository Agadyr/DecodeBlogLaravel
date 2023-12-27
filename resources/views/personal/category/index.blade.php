<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link href="{{asset('css/all.css')}}">
    <link rel="stylesheet" href="../../css/all.css">
</head>
<body>
    @include('includes.header')
    <div class="plr4 df jcsb g3">
            <div class="post-cards">
                @if(count($postsUser) <= 0)
                    <h1 style="font-size: 20px;text-align: left">Не было найдено постов по этой <span style="color: #007bff">Категории</span></h1>
                @endif
                @foreach($postsUser as $post)
                <h1></h1>
                <p class="default-title"></p>
                <div>
                    <a href="{{route('post.show',$post->id)}}">
                        <img class="post-img pt1" src="{{asset('storage/'.$post->image)}}" style="width: 100%;height: 400px;object-fit: cover;">
                    </a>
                    <h2 class="title">{{$post->title}}</h2>
                    <p class="description">{{$post->content}} </p>
                    <div class="about-post df jcsb aic">
                        <div class="calendar df jcsb aic g3">
                            <img src="{{asset('/images/calendar.svg')}}">
                            <h3>{{$post->updated_at->month}}.{{$post->updated_at->day}}.{{$post->updated_at->year}}</h3>
                        </div>
                        <div class="eye df jcsb aic g3">
                            <img src="{{asset('/images/eye.svg')}}">
                            <h3>21</h3>
                        </div>
                        <div class="comment df jcsb aic g3">
                            <img src="{{asset('/images/comment.svg')}}">
                            <h3>{{count($post->comments)}}</h3>
                        </div>
                        <div class="fill df jcsb aic g3">
                            <img src="{{asset('/images/fill.svg')}}">
                            <h3>{{$post->category->title}}</h3>
                        </div>
                        <div class="usersShow df jcsb aic g3">
                            <img src="{{asset('/images/Vector.svg')}}">
                            <h3>{{$post->user->name}}</h3>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>


        <div class="category-cards">
            <h1>Категории</h1>
            @foreach($categories as $category)
                <a class="category-item"  href="{{route('personal.category.index',$category->id)}}">{{$category->title}}</a>
            @endforeach
        </div>
    </div>
</body>
</html>
