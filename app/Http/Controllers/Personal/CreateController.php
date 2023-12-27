<?php

namespace App\Http\Controllers\Personal;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function __invoke()
    {
        dd(444);
//        $categories = Category::all();
//        return view('personal.create',compact('categories'));
    }
}
