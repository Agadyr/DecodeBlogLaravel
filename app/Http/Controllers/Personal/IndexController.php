<?php

namespace App\Http\Controllers\Personal;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $posts = auth()->user()->posts;
        $createData = Post::all()->pluck('created_at');
        foreach ($posts as $post) {
            $post->created_at = Carbon::parse($post->created_at);
        }

        return view('personal.index', compact('posts', 'createData'));
    }
}
