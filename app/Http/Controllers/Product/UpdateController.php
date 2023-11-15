<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(Product $product,UpdateRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('thumbnail')) {
            // Удаление старого файла, если он существует
            if ($product->thumbnail) {
                Storage::delete($product->thumbnail);
            }

            $path = $request->file('thumbnail')->store('thumbnails', 'public');
            $data['thumbnail'] = $path;
        }

        $product->update($data);

        return redirect()->route('product.index');
    }
}
