<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/create.css') }}">

</head>

<body class="font-sans antialiased dark:bg-black dark:text-white/50">

    <div class="wrapper_create dark_blue">
        <h1>Добавить продукт</h1>

        
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @if ($error == 'The article field format is invalid.')
                            <li>Артикул может состоять только из латинских букв и цифр</li>
                        @endif
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('products.store') }}" method="POST">
            @csrf
            <label for="article">Артикул</label>
            <input type="text" name="article" id="article">
            <label for="name">Название</label>
            <input type="text" name="name" id="name">
            <label for="status">Статус</label>
            <select name="status" id="status">
                <option value="available">Доступен</option>
                <option value="unavailable">Не доступен</option>
            </select>

            <p class="attr_title">Атрибуты</p>

            <div class="atributs_container">

            </div>

            <p class="add_attribute"><a href="">+ Добавить атрибут</a></p>

            <input type="submit" class="button" id="send-fields" value="Добавить">
        </form>
    </div>

    @include('components.adding-attributes')
</body>

</html>
