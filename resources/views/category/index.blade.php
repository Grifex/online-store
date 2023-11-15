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
            <th scope="col">Имя категории</th>
            <th scope="col">Путь категории</th>
            <th scope="col">Изменить категорию</th>
            <th scope="col">Удалить категорию</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
        <tr>

                <td><a href="{{route('category.show',$category)}}">{{$category->name}}</a></td>
                <td>{{ $category->getPath()}}</td>

                <td><a class="btn btn-primary" role="button" href="{{route('category.edit',$category)}}">Изменить</a></td>
                <td>
                    <form action="{{route('category.delete',$category)}}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger" type="submit">Удалить</button>
                    </form>
                </td>
        </tr>
        @endforeach
        </tbody>
    </table>


    <a class="btn btn-primary" role="button" href="{{route('category.create')}}">Добавить категорию</a>
</div>
</body>
</html>
