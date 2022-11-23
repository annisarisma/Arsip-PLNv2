<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arsip PLN | {{ $title }}</title>
    <link rel="shortcut icon" href="{{ asset('/Image/favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/Image/favicon.png') }}">
    @include('layouts.style')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>

<body style="background-color: #F6F8FC;">
    <div class="wrapper sticky">

        @include('layouts.sidebar')

        <section class="home-section">
            @include('layouts.navbar')
            @yield('content')
        </section>
    </div>

    @include('layouts.script')
</body>

</html>
