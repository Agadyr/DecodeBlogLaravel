<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $posts = Post::all();
        foreach ($posts as $post) {
            $post->created_at = Carbon::parse($post->created_at);
        }
        return view('post.main', compact('posts'));
    }
}
