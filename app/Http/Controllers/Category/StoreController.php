<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {

        $data = $request->validated();

        $category =  new Category;
        $category->name = $data['name'];
        $category->slug = $data['name'];

        if(!empty($data['parent_id'])){
            $parent = Category::find($data['parent_id']);
            $category->appendToNode($parent)->save();
        }else{
            $category->saveAsRoot();
        }
        return redirect()->route('category.index');
    }
}
