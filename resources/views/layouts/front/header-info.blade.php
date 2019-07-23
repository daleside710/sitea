<!-- Basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="keywords" content="Purchase Order Compra Orden" />
<meta name="description" content="Purchase Order Compra Orden">
<meta name="author" content="JoseCruzLira">
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Mobile Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">

<!-- Title -->
<title>{{ __('word.title') }}</title>

<!-- Favicon -->
<link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon" />
<link rel="apple-touch-icon" href="{{ asset('img/apple-touch-icon.png') }}">

<!-- Web Fonts  -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light" rel="stylesheet" type="text/css">

<!-- Vendor CSS -->
<link rel="stylesheet" href="{{ asset('themes/porto_v7.5/vendor/bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('themes/porto_v7.5/vendor/fontawesome-free/css/all.min.css') }}">
<link rel="stylesheet" href="{{ asset('themes/porto_v7.5/vendor/animate/animate.min.css') }}">
<link rel="stylesheet" href="{{ asset('themes/porto_v7.5/vendor/simple-line-icons/css/simple-line-icons.min.css') }}">
<link rel="stylesheet" href="{{ asset('themes/porto_v7.5/vendor/owl.carousel/assets/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('themes/porto_v7.5/vendor/owl.carousel/assets/owl.theme.default.min.css') }}">
<link rel="stylesheet" href="{{ asset('themes/porto_v7.5/vendor/magnific-popup/magnific-popup.min.css') }}">
<link href="https://unpkg.com/pnotify@4.0.0/dist/PNotifyBrightTheme.css" rel="stylesheet">


<!-- Theme CSS -->
<link rel="stylesheet" href="{{ asset('themes/porto_v7.5/css/theme.css') }}">
<link rel="stylesheet" href="{{ asset('themes/porto_v7.5/css/theme-elements.css') }}">
<link rel="stylesheet" href="{{ asset('themes/porto_v7.5/css/theme-blog.css') }}">
<link rel="stylesheet" href="{{ asset('themes/porto_v7.5/css/theme-shop.css') }}">

<!-- Current Page CSS -->
@stack('page_css')

<!-- Demo CSS -->


<!-- Skin CSS -->
<link rel="stylesheet" href="{{ asset('themes/porto_v7.5/css/skins/default.css') }}">

<!-- Theme Custom CSS -->
<link rel="stylesheet" href="{{ asset('themes/porto_v7.5/css/custom.css') }}">

<!-- User CSS -->
<link rel="stylesheet" href="{{ asset( 'css/global.css' ) }}">

<!-- Head Libs -->
<script src="{{ asset('themes/porto_v7.5/vendor/modernizr/modernizr.min.js') }}"></script>