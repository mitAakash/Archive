<head>

    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="description" content="Whatsapp">
    <meta name="author" content="Dharmendra">
    <meta name="keywords"
        content="">
    <!-- Favicon -->
    <link rel="icon" href="{{asset('assets/img/brand/favicon.ico')}}" type="image/x-icon" />

    <!-- Title -->
    <title>   {{$title ?? ''}} | Whatsapp</title>
 

    <!-- Bootstrap css-->
    <link id="style" href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" />

    <!-- Icons css-->
    <link href="{{asset('assets/plugins/web-fonts/icons.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/plugins/web-fonts/font-awesome/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/web-fonts/plugin.css')}}" rel="stylesheet" />

    <!-- Style css-->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

    <!-- Select2 css-->
    <link href="{{asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">

    <!-- Mutipleselect css-->
    <link rel="stylesheet" href="{{asset('assets/plugins/multipleselect/multiple-select.css')}}">
    <link href="{{asset('assets/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
    <link href="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-1.13.6/b-2.4.1/b-html5-2.4.1/b-print-2.4.1/cr-1.7.0/r-2.5.0/rg-1.4.0/sc-2.2.0/datatables.min.css" rel="stylesheet">

    @yield('css')
</head>