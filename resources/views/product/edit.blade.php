<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
        <div class="container">
            <form action="{{route('product.update',$product)}}"  class="w-25" method="post"  enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="formGroupExampleInput">Название товара</label>
                    <input type="text" class="form-control" placeholder="Title" name="name" value="{{$product->name}}">
                </div>

                <div class="form-group">
                    <label for="formGroupExampleInput">Описание товара</label>
                    <input type="text" class="form-control" placeholder="Title" name="description" value="{{$product->description}}">
                </div>

                <div class="form-group">
                    <label for="formGroupExampleInput">Цена товара</label>
                    <input type="number" class="form-control" placeholder="Title" name="price" value="{{$product->price}}">
                </div>


                <div>
                    <img src="{{asset('storage/' . $product->thumbnail) }}" class="card-img-top" alt="Изображение товара">
                </div>



                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Изображение для товара</label>
                    <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="thumbnail">
                </div>




                <label for="selectCategory">Выбирите категорию</label>
                <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="category_id" id="selectCategory">
                    @foreach($categories as $category)
                        <option value={{$category->id}}
                            {{$product->category_id == $category->id ? 'selected' : ''}}>

                            {{$category->name}}</option>
                    @endforeach
                </select>

                <input type="submit" class="btn btn-primary" value="Изменить">
            </form>
        </div>
</body>
</html>
