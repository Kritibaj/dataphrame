<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Welcome To | Bootstrap Based Admin Template - Material Design</title>
    <!-- Favicon-->
    <link rel="icon" href="{!! asset('favicon.ico') !!}" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{!! asset('theme/plugins/bootstrap/css/bootstrap.css') !!}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{!! asset('theme/plugins/node-waves/waves.css') !!}" rel="stylesheet" />

    <!-- Bootstrap Select Css -->
    <link href="{!! asset('theme/plugins/bootstrap-select/css/bootstrap-select.css') !!}" rel="stylesheet" />
    <!-- Animation Css -->
    <link href="{!! asset('theme/plugins/animate-css/animate.css') !!}" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="{!! asset('theme/plugins/morrisjs/morris.css') !!}" rel="stylesheet" />
    <!-- JQuery DataTable Css -->
     @yield('head_style')
    <!-- Custom Css -->
    <link href="{!! asset('theme/css/style.css') !!}" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{!! asset('theme/css/themes/all-themes.css') !!}" rel="stylesheet" />
    <link rel="stylesheet" href="{!! asset('css/custom.css') !!}">
</head>
<input type="hidden" id="currentrole" value="{{ Auth::user()['roles'][0]['name'] }}" >