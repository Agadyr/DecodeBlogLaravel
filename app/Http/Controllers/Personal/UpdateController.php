<?php

namespace App\Http\Controllers\Personal;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(Request $request,Post $post)
    {
        $data = $request->validate([
            'title'=>'required|string',
            'content'=>'required|string',
            'image'=>'required|file',
            'category_id'=>'required|exists:categories,id'
        ]);


        $data['image'] = Storage::disk('public')->put('/images',$data['image']);
        $post->update($data);
        return redirect()->route('personal.posts');
    }
}
