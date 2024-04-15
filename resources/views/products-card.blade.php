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
    <link rel="stylesheet" href="{{ asset('css/card.css') }}">

</head>

<body class="font-sans antialiased dark:bg-black dark:text-white/50">

    <div class="wrapper_create dark_blue">
        <div class="card_top">
            <h1 class="card_title">{{ $product->name }}</h1>
            <div class="card_icons_box">
                <a href="{{ route('products.edit', $product->id) }}"><img src="{{ asset('img/icon-1.svg') }}"></a>
                {{-- <a href=""><img src="{{ asset('img/icon-2.svg') }}"></a> --}}
                <form action="{{route('products.destroy', $product->id)}}" method="POST" class="card_del_form">
                    @csrf
                    @method('delete')
                    <input type="image" src="{{asset('img/icon-2.svg')}}" value="Сохранить">
                </form>
            </div>
        </div>

        <div class="card_row">
            <span class="left_info">Артикул</span>
            <span class="right_info upper">{{ $product->article }}</span>
        </div>
        <div class="card_row">
            <span class="left_info">Название</span>
            <span class="right_info">{{ $product->name }}</span>
        </div>
        <div class="card_row">
            <span class="left_info">Статус</span>
            <span class="right_info">{{ $product->status == 'available' ? 'Доступен' : 'Не доступен' }}</span>
        </div>
        <div class="card_row">
            <span class="left_info">Данные</span>
            <span class="right_info">
                @include('components.php-logic')
                @php
                    if ($product->data !== null && $product->data !== '[]') {
                        $d = json_decode($product->data);
                        handler1($d->plus_name, 1);
                        handler1($d->plus_value, 0);
                    }
                @endphp
            </span>
        </div>

    </div>

</body>

</html>
