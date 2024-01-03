<?php

namespace App\Http\Controllers\Personal;

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
        $posts = auth()->user()->posts()->where('title','LIKE',"%{$s}%")->paginate(6);
        $updated_at = Post::all()->pluck('created_at');
        foreach ($posts as $post) {
            $post->updated_at = Carbon::parse($post->updated_at);
        }

        return view('personal.index', compact('posts', 'updated_at'));
    }
}
