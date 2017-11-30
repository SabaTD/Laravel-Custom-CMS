		<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>@yield('title')</title>
		<link rel="icon" type="image/gif" href="{{asset('img/favicon.ico')}}" />
    <link rel="apple-touch-icon" sizes="57x57" href="{{asset('img/apple-icon-57x57.png')}}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{asset('img/apple-icon-60x60.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset('img/apple-icon-72x72.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('img/apple-icon-76x76.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('img/apple-icon-114x114.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{asset('img/apple-icon-120x120.png')}}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{asset('img/apple-icon-144x144.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{asset('img/apple-icon-152x152.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('img/apple-icon-180x180.png')}}">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{asset('img/android-icon-192x192.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('img/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset('img/favicon-96x96.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('img/favicon-16x16.png')}}">
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{URL::current()}}" />
		<meta property="og:title" content="@yield('title', env('APP_NAME', 'Toyota Center Tegeta'))"/>
		<meta property="og:image" content="@yield('img', asset('img/og_image.jpg'))"/>
		<meta property="og:site_name" content="{{env('APP_NAME', 'Toyota Center Tegeta')}}"/>
		<meta property="og:description" content="@yield('desc', env('APP_NAME', 'Toyota Center Tegeta'))"/>
    <link rel="stylesheet" href="{{asset('assets/client/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/client/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('assets/client/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/client/css/fonts.css')}}">
    <link rel="stylesheet" href="{{asset('assets/client/css/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('assets/client/css/owl.carousel.min.css')}}">
		<link rel="stylesheet" href="{{asset('assets/client/css/bootstrap-select.min.css')}}">
		<link rel="stylesheet" href="{{asset('assets/client/css/jquery-ui.css')}}">

    @yield('css')
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
