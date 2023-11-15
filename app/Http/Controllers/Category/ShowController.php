<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(Category $category)
    {

     /*   $category = Category::where('slug', $slug)->firstOrFail();
        $children = $category->descendants()->get();*/

        return view('category.show',compact('category'));

//        return view('category.show', compact('category', 'children'));


/*        $slugs = collect(explode('/', $slugs));

        $category = Category::where('slug', $slugs[count($slugs)-1])->firstOrFail();


        // Проверка, что полный путь категории соответствует URL
        if ($category->full_path != $slugs->implode('/')) {
            abort(404);
        }

        return view('categories.show', compact('category'));*/
    }
}
