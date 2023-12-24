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


        <div>
            <img class="post-img pt1" src="{{asset('storage/'.$post->image)}}"
                 style="max-width: 861px;width: 100%;height: 400px;object-fit: cover;">


                    <div class="settings df jcsb aic">
                        <h2 class="title">{{$post->title}}</h2>
                        @auth()
                            @if(Auth()->user()->name == $post->user->name)
                        <div class="df jcsb aic g2 more-icon">
                            <img src="{{asset('images/morevertical.svg')}}" style="cursor:pointer;"
                                 onclick="ToggleMenu()">
                            <p>Еще</p>
                            <div class="more-card g3">
                                <a href="{{route('personal.post.edit',$post->id)}}" class="more-link"
                                   style="color: black;font-weight: 500;">Редактировать{{$post->id}}</a>
                                <form action="{{route('personal.post.delete',$post->id)}} " method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button href="" style="color: red;font-weight: 500;margin-bottom: 10px;">Удалить
                                    </button>
                                </form>
                            </div>
                        </div>
                            @endif
                        @endauth
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
                    <h3>4</h3>
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
            <h3 class="mtb2" style="font-size: 22px;">2 Комментария</h3>
            <div class="comments">
                <div class="df  aic">
                    <img src="{{asset('images/ava.png')}}" style="width: 50px;" class="mr2">
                    <h2>Елнур Сеитжанов</h2>
                </div>
                <p class="mtb2">В отличие от обычных виджетов пользовательского интерфейса JavaScript, комплексные
                    виджеты -
                    это полноценные приложения, которые не требуют дополнительной настройки и кастомизации.
                </p>

                <div class="df  aic">
                    <img src="{{asset('images/ava.png')}}" style="width: 50px;" class="mr2">
                    <h2>Елнур Сеитжанов</h2>
                </div>
                <p class="mtb2">В отличие от обычных виджетов пользовательского интерфейса JavaScript, комплексные
                    виджеты -
                    это полноценные приложения, которые не требуют дополнительной настройки и кастомизации.
                </p>
            </div>

            <form class="SendComment">
                <textarea placeholder="Введите текст комментарий"></textarea>
                <button class="button-primary">Отправить</button>
            </form>
        </div>
    </div>
    <div class="category-cards">
        <h1>Категории</h1>
        <a class="category-item" href="#">Прогнозы в IT</a>
        <a class="category-item" href="#">Веб-разработка</a>
        <a class="category-item" href="#">Мобильная разработка</a>
        <a class="category-item" href="#">Фриланс</a>
        <a class="category-item" href="#">Алгоритмы</a>
        <a class="category-item" href="#">Тестирование IT систем</a>
        <a class="category-item" href="#">Разработка игр</a>
        <a class="category-item" href="#">Дизайн и юзабилити</a>
        <a class="category-item" href="#">Искуственный интелект</a>
        <a class="category-item pb1" href="#">Машинное обучение</a>
    </div>
</div>
<script>

    function ToggleMenu() {
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
