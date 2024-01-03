<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __invoke(Request $request)
    {
        $s = $request->s;
        $posts = Post::where('title','LIKE',"%{$s}%")->paginate(6);
        foreach ($posts as $post) {
            $post->updated_at = Carbon::parse($post->updated_at);
        }
        $categories = Category::all();

        return view('post.main', compact('posts','categories'));
    }
}
