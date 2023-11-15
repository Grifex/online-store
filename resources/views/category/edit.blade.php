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
            <form action="{{route('category.update',$category)}}"  class="w-25" method="post">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="formGroupExampleInput">Название категории</label>
                    <input type="text" class="form-control" placeholder="Title" name="name" value="{{$category->name}}">

                </div>


                <div class="form-group">
                    <label for="category">Категория поста</label>
                    <select class="form-control" id="category" name="parent_id">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>


                <input type="submit" class="btn btn-primary" value="Обновить">
            </form>
        </div>
</body>
</html>
