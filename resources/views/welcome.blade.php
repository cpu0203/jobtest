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

</head>

<body class="font-sans antialiased dark:bg-black dark:text-white/50">

    <div class="wrapper">
        <div class="left_box dark_blue">
            <div class="logo_box">
                <div class="logo_div">
                    <a href=""><img src="{{asset('img/logo.svg')}}" class="logo_img"></a>
                </div>
                <div class="text_div">
                    Enterprise</br>
                    Resource</br>
                    Planning
                </div>
            </div>
            
            <p><a href="{{route('products.index')}}" class="left_link {{Route::current()->getName() !== 'products.index' ? 'min_opc' : ''}}">Продукты</a></p>
            <p><a href="{{route('products.available')}}" class="left_link {{Route::current()->getName() !== 'products.available' ? 'min_opc' : ''}}">Доступные</a></p>
            
        </div>
        <div class="right_box">
            <div class="right_top">
                <span>ПРОДУКТЫ</span>
                <span>{{config('products.role') == 'admin' ? 'Администратор' : 'Иванов Иван Иванович'}}</span>
            </div>

            <div class="right_content">
                <table class="right_box_table">
                    <tr>
                        <th>АРТИКУЛ</th>
                        <th>НАЗВАНИЕ</th>
                        <th>СТАТУС</th>
                        <th>АТРИБУТЫ</th>
                    </tr>

                    @include('components.php-logic')

                    @foreach ($products as $product)
                        <tr>
                            <td><a href="{{route('products.show', $product->id)}}" class="article_link">{{ $product->article }}</a></td>
                            <td><a href="{{route('products.show', $product->id)}}">{{ $product->name }}</a></td>
                            <td>{{ $product->status == 'available' ? 'Доступен' : 'Не доступен' }}</td>
                            <td>
                                @php
                                        if ($product->data !== null && $product->data !== '[]') {
                                        $d = json_decode($product->data);
                                        handler1($d->plus_name, 1);
                                        handler1($d->plus_value, 0);
                                    }
                                @endphp
                            </td>
                        </tr>
                    @endforeach

                </table>
                <div class="div_under_btn">
                    <a href="{{ route('products.create') }}" class="add_button">Добавить</a>
                </div>
            </div>

        </div>
    </div>

</body>

</html>
