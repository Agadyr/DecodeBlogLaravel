<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Carbon\Carbon;

class ShowController extends Controller
{
    public function __invoke(Post $post)
    {
        $post->updated_at = Carbon::parse($post->updated_at);
        return view('post.show', compact('post'));
    }
}
