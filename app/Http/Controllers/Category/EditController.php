<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function __invoke(Category $category)
    {
        $categories = Category::where('id','!=',$category->id)->get();

        return view('category.edit',compact('category','categories'));
    }
}
