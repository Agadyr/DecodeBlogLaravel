<?php

namespace App\Http\Controllers\Personal;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(Request $request)
    {


        $data = $request->validate([
            'title'=>'required|string',
            'content'=>'required|string',
            'image'=>'required|file',
            'category_id'=>'required|exists:categories,id'
        ]);
        $data['user_id'] = auth()->user()->id;
        $data['image'] = Storage::disk('public')->put('/images',$data['image']);
        Post::firstOrCreate($data);
//        dd($data);
        return redirect()->route('personal.posts');
    }
}
