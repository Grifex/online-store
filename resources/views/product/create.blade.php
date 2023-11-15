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
    <div class="col-md-6">
    <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Имя товара</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name">
        </div>

        <label for="selectCategory">Выбирите категорию</label>
        <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="category_id" id="selectCategory">
            @foreach($categories as $category)
                <option value={{$category->id}}>{{$category->name}}</option>
                @if(!empty($category->parent))
                    {{$category->getPath()}}
                @endif
            @endforeach
        </select>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Описание</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="description">
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Цена товара</label>
            <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="price">
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Изображение для товара</label>
            <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="thumbnail">
        </div>


        <button type="submit" class="btn btn-primary">Создать</button>
    </form>
    </div>
</div>
</body>

</html>
