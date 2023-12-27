<div class="bg">
    <div class="header plr4 df jcsb aic pt1">
        <a href="{{route('posts')}}">Decode Blog</a>
        <div class="search-header">
            <input type="text" value="Поиск по Блогам">
            <button class="button-primary jcsb aic"> <img src="../../images/search.svg" > Найти</button>
        </div>
        <div class="reg-log aic">
            @auth()
                <a href="{{route('personal.posts')}}">
                    <img style="width: 50px;height: 50px" src="{{asset('/images/ava.png')}}">
                </a>

            @endauth

            @guest()
                <a class="button-primary-a" href="{{route('register')}}">Регистрация</a>
                <a class="button-primary-a " href="{{route('login')}}">Вход</a>
            @endguest
        </div>
    </div>
</div>

