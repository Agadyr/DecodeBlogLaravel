<?php

namespace App\Http\Controllers\Personal;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(Post $post)
    {
        $comments = $post->comments;
        $post->updated_at = Carbon::parse($post->updated_at);
        $categories = Category::all();
        return view('personal.show',compact('post','comments','categories'));
    }
}
