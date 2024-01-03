<div class="bg">
    <div class="header plr4 df jcsb aic pt1">
        <a href="{{route('posts')}}">Decode Blog</a>
            <form method="get" action="{{route('home.search')}}">
                <div class="search-header">
                    <input name="s" id="s" type="text" value="" placeholder="Поиск по блогам">
                    <button type="submit" class="button-primary jcsb aic"> <img src="../../images/search.svg" > Найти</button>
                </div>
            </form>



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

