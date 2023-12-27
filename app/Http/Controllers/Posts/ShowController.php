<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;

class ShowController extends Controller
{
    public function __invoke(Post $post)
    {
        $post->updated_at = Carbon::parse($post->updated_at);
        $categories = Category::all();
        if (auth()->user()){
            $post->visits += 1;
            $post->save();
        }

        return view('post.show', compact('post','categories'));
    }
}
