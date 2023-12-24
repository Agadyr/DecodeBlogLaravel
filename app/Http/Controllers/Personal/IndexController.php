<?php

namespace App\Http\Controllers\Personal;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;

use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $posts = auth()->user()->posts;
//        dd($posts);
//        $createData = Post::all()->pluck('created_at');
//        dd($createData);
        return view('personal.index',compact('posts'));
    }
}
