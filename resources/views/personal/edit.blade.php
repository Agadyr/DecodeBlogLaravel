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
@include('includes.header')
<div class="plr4 df jcsb g3 create-post">
    <div class="post-cards " style="width: 100%;height: 100vh">
        <h1 style="padding: 0!important;text-align: left">Новый блог</h1>
        <form class="post-create-form" action="{{route('personal.post.update',$post->id)}}" method="POST" enctype="multipart/form-data" >
            @csrf
            @method('patch')
            <input value="{{$post->title}}" placeholder="Введите заголовок блога" class="w1" name="title">
            @error('title')
            <p class="error">{{$message}}</p>
            @enderror
            <select id="category" class="w1" name="category_id">
                <option value="Выберите Категорию" selected disabled>Выберите категорию</option>
                @foreach($categories as $category)
                    <option
                        {{$category->id == $post->category_id ? 'selected' : ''}}
                        value="{{$category->id}}">{{$category->title}}</option>
                @endforeach
            </select>
            @error('category')
            <p class="error">{{$message}}</p>
            @enderror
            <button type="button" class="upload-btn">
                Выберите картинку
                <input type="file" class="file" name="image">
            </button>
            @error('image')
            <p class="error">{{$message}}</p>
            @enderror
            <div style="width: 200px;height: 200px" class="mtb2">
                <img src="{{asset('storage/'.$post->image)}}" style="width: 100%;height: 100%;object-fit: cover">
            </div>
            <textarea placeholder="Введите описание блога" class="w1" name="content">{{$post->content}}</textarea>
            @error('content')
            <p class="error" style="margin-bottom: 10px">{{$message}}</p>
            @enderror
            <button type="submit" class="button-primary">Создать</button>
        </form>
    </div>
</div>
</body>
</html>
