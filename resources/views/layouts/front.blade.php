<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    @include('layouts.front.header-info')

</head>
<body>

<div class="body">

    @include('layouts.front.header')

    <div role="main" class="main">

        <!-- Current Menu Path -->
        @include('layouts.front.menu-path')

        <!-- Current Page Content -->
        @stack('page_content')

    </div>

    @include('layouts.front.footer')

</div>

@include('layouts.front.footer-info')

</body>
</html>