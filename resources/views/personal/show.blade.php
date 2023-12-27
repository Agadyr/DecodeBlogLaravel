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
            <button class="button-primary">Новый блог</button>
        </div>

        <div>
            <img class="post-img pt1" src="{{asset('storage/'.$post->image)}}">
            <div class="settings df jcsb aic">
                <h2 class="title">{{$post->title}}</h2>
                <div class="df jcsb aic g2 more-icon">
                    <img src="{{asset('images/morevertical.svg')}}" style="cursor:pointer;" onclick="ToggleMenu()">
                    <p>Еще</p>
                    <div class="more-card g3">
                        <a href="{{route('personal.post.edit',$post->id)}}" class="more-link" style="color: black;font-weight: 500;">Редактировать{{$post->id}}</a>
                        <form action="{{route('personal.post.delete',$post->id)}} " method="POST">
                            @csrf
                            @method('DELETE')
                            <button href="" style="color: red;font-weight: 500;margin-bottom: 10px;">Удалить
                            </button>
                        </form>
                    </div>
                </div>

            </div>

            <p class="description">{{$post->content}} </p>
            <div class="about-post df jcsb aic">
                <div class="calendar df jcsb aic g3">
                    <img src="{{asset('/images/calendar.svg')}}">
                    <h3>{{$post->updated_at->day}}.{{$post->updated_at->month}}.{{$post->updated_at->year}}</h3>
                </div>
                <div class="eye df jcsb aic g3">
                    <img src="{{asset('/images/eye.svg')}}">
                    <h3>21</h3>
                </div>
                <div class="comment df jcsb aic g3">
                    <img src="{{asset('/images/comment.svg')}}">
                    <h3>{{count($comments)}}</h3>
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
            <h3 class="mtb2" style="font-size: 22px;">{{count($comments)}} Комментария</h3>
            <div class="comments">
                @foreach($comments as $comment)

                <div class="df  aic">
                    <img src="{{asset('images/ava.png')}}" style="width: 50px;" class="mr2">
                    <h2>{{$comment->user->name}}</h2>
                </div>
                <div class="df aic jcsb">
                    <p class="mtb2">
                        {{$comment->message}}
                    </p>
                    <p style="color: #6b7280;font-size: 14px;">
                        {{$comment->DateAsCarbon->diffForHumans()}}
                    </p>
                </div>

                @endforeach
            </div>

            <form class="SendComment" action="{{route('personal.comment.store',$post->id)}}" method="POST">
                @csrf
                <textarea name="message" placeholder="Введите текст комментарий"></textarea>
                <button class="button-primary">Отправить</button>
            </form>
        </div>
    </div>
    <div class="category-cards" >
        <h1>Категории</h1>
        @foreach($categories as $category)
            <a class="category-item" href="{{route('personal.category.index',$category->id)}}">{{$category->title}}</a>
        @endforeach
    </div>
</div>
<script>

    function ToggleMenu(){
        let drop1 = document.querySelector('.more-card')
        if (drop1.style.display === 'none' || drop1.style.display === '') {
            drop1.style.display = 'block';
        } else {
            drop1.style.display = 'none';
        }
    }
</script>
</body>
</html>
