<?php

namespace App\Http\Controllers\Posts\Comment;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(Request $request,Post $post)
    {

        $data = $request->validate([
            'message'=>'required|string',
        ]);
        $data['user_id'] = auth()->user()->id;
        $data['post_id'] = $post->id;
        Comment::create($data);

        return redirect()->route('post.show',$post->id);
    }
}
