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


    <table class="table">
        <thead>
        <tr>
            <th scope="col">Название товара</th>
            <th scope="col">Категория товара</th>
            <th scope="col">Изменить товар</th>
            <th scope="col">Удалить категорию</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
        <tr>
                <td><a href="{{route('product.show',$product)}}">{{$product->name}}</a></td>
                <td>{{ $product->category->name}}</td>

                <td><a class="btn btn-primary" role="button" href="{{route('product.edit',$product)}}">Изменить</a></td>
                <td>
                    <form action="{{route('product.delete',$product)}}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger" type="submit">Удалить</button>
                    </form>
                </td>
        </tr>
        @endforeach
        </tbody>
    </table>


    <a class="btn btn-primary" role="button" href="{{route('product.create')}}">Добавить товар</a>
</div>
</body>
</html>
