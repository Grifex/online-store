<?php

use App\Http\Controllers\ProfileController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


//Route::get('categories/{category_by_slug}', 'App\Http\Controllers\Category\ShowController')->where('category_by_slug', '.*');
Route::group(['namespace'=>'App\Http\Controllers\Category','prefix'=>'category'], function(){
    Route::get('/',  'IndexController')->name('category.index');
    Route::get('/create','CreateController')->name('category.create');
    Route::post('/',  'StoreController')->name('category.store');
    Route::get('/{category}',  'ShowController')->name('category.show');
    Route::get('/{category}/edit',  'EditController')->name('category.edit');
    Route::patch('/{category}',  'UpdateController')->name('category.update');
    Route::delete('/{category}',  'DeleteController')->name('category.delete');
});


Route::group(['namespace'=>'App\Http\Controllers\Product','prefix'=>'product'], function(){
    Route::get('/',  'IndexController')->name('product.index');
    Route::get('/create','CreateController')->name('product.create');
    Route::post('/',  'StoreController')->name('product.store');
    Route::get('/{product}',  'ShowController')->name('product.show');
    Route::get('/{product}/edit',  'EditController')->name('product.edit');
    Route::patch('/{product}',  'UpdateController')->name('product.update');
    Route::delete('/{product}',  'DeleteController')->name('product.delete');
});





require __DIR__.'/auth.php';
