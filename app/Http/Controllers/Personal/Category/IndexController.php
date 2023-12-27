<?php

namespace App\Http\Controllers\Personal\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __invoke(Category $category)
    {

        $posts = $category->posts()->paginate(6);
        $user = auth()->user();
        $postsUser = $posts->where('user_id',$user->id);
        foreach ($posts as $post) {
            $post->updated_at = Carbon::parse($post->updated_at);
        }
        $categories = Category::all();
        return view('personal.category.index', compact('postsUser','categories'));
    }
}
