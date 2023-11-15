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

            <div class="container mt-5">
                <div class="card" style="width: 18rem;">
                    <!-- Изображение товара -->
                    <img src="{{asset('storage/' . $product->thumbnail) }}" class="card-img-top" alt="Изображение товара">

                    <div class="card-body">
                        <!-- Название товара -->
                        <h5 class="card-title">{{$product->name}}</h5>

                        <!-- Цена товара -->
                        <p class="card-text"><strong>Цена:</strong>{{$product->price}}</p>

                        <!-- Краткое описание -->
                        <p class="card-text">{{$product->description}}</p>

                        <!-- Кнопка для действия (например, покупки) -->
                    </div>
                </div>


        </div>
</body>
</html>
