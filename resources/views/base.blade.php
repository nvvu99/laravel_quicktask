<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('labels.branch') }} - @yield('title')</title>

    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    @yield('addtional_stylesheet')

    <script src="https://kit.fontawesome.com/5f35b52da0.js" crossorigin="anonymous" defer></script>
</head>
<body>
    @section('header')
        @include('components.header')
    @show

    @yield('content')

    @section('sidebar')
        @include('components.sidebar')
    @show

    @yield('addtional_script')
</body>
</html>
