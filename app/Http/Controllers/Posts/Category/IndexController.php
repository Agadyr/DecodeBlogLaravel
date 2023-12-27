<?php

namespace App\Http\Controllers\Posts\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(Category $category)
    {

        $posts = $category->posts()->paginate(6);
        foreach ($posts as $post) {
            $post->updated_at = Carbon::parse($post->updated_at);
        }
        $categories = Category::all();
        return view('post.category.index', compact('posts','categories'));
    }
}
