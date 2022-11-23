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
</head>

<body>
    <section class="home-section">
        @yield('content')
    </section>

    @include('layouts.script')
</body>

</html>