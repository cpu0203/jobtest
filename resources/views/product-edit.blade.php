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
        <h1>{{ $product->name }}</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('products.update', $product->id) }}" method="POST">
            @csrf
            @method('patch')
            <label for="article">Артикул</label>
            @if (config('products.role') == 'admin')
                <input type="text" name="article" id="article" value="{{ $product->article }}"
                    style="text-transform: uppercase">
            @elseif (config('products.role') == 'guest')
                <div class="edit_article" style="text-transform: uppercase">{{ $product->article }}</div>
            @endif

            <label for="name">Название</label>
            <input type="text" name="name" id="name" value="{{ $product->name }}">
            <label for="status">Статус</label>
            <select name="status" id="status">
                @php
                    $selectData = ['available' => 'Доступен', 'unavailable' => 'Не доступен'];
                @endphp
                @foreach ($selectData as $item => $value)
                    <option value="{{ $item }}" {{ $product->status == $item ? 'selected' : '' }}>
                        {{ $value }}</option>
                @endforeach
            </select>

            <p class="attr_title">Атрибуты</p>

            <div class="atributs_container">

                @php
                    $data = json_decode($product->data);
                @endphp

                @if ($data !== null && $data !== '[]' && count((array) $data) > 0)
                    @for ($i = 0; $i < count($data->plus_name); $i++)
                        <div class="attribut_box">
                            <div class="attribut_box_inner">
                                <label for="plus_name">Название</label>
                                <input type="text" name="plus_name[]" id="plus_name"
                                    value="{{ $data->plus_name[$i] }}">
                            </div>
                            <div class="attribut_box_inner">
                                <label for="value">Значение</label>
                                <input type="value" name="plus_value[]" id="value"
                                    value="{{ $data->plus_value[$i] }}">
                            </div>
                            <img src="{{ asset('img/trash-icon.svg') }}" class="trash_icon">
                        </div>
                    @endfor
                @endif

            </div>

            <p class="add_attribute"><a href="">+ Добавить атрибут</a></p>

            <input type="submit" class="button" id="send-fields" value="Сохранить">

        </form>
    </div>




    @include('components.adding-attributes')
</body>

</html>
