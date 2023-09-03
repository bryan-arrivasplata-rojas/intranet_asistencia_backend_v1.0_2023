<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Intranet_Asistencia</title>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="shortcut icon" href="{{asset('images/intranet.ico')}}" />
    
    @livewireStyles
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" >
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    <link href="https://cdn.datatables.net/v/dt/jq-3.7.0/jszip-3.10.1/dt-1.13.5/af-2.6.0/b-2.4.1/b-colvis-2.4.1/b-html5-2.4.1/b-print-2.4.1/cr-1.7.0/date-1.5.1/fc-4.3.0/fh-3.4.0/kt-2.10.0/r-2.5.0/rg-1.4.0/rr-1.4.1/sc-2.2.0/sb-1.5.0/sp-2.2.0/sl-1.7.0/sr-1.3.0/datatables.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/css/bootstrap-datepicker.min.css" integrity="sha512-34s5cpvaNG3BknEWSuOncX28vz97bRI59UnVtEEpFX536A7BtZSJHsDyFoCl8S7Dt2TPzcrCEoHBGeM4SUBDBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{asset('css/home.css')}}" rel="stylesheet">
    <link href="{{asset('css/login.css')}}" rel="stylesheet">
    <link href="{{asset('css/sidehead.css')}}" rel="stylesheet">
    <link href="{{asset('css/sidebar.css')}}" rel="stylesheet">
    <link href="{{asset('css/welcome.css')}}" rel="stylesheet">
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link href="{{asset('css/tablas.css')}}" rel="stylesheet">
    
</head>
<body>
    <!-- Loader -->
    <span id="session_auto" hidden>{{env('SESSION_LIFETIME_AUTO')}}</span>
    <div id="loader-overlay">
        <div id="loader"></div>
    </div>
    @if(session('idUser'))
        <span id="idDepartmentUser" hidden>{{session('idDepartmentUser')}}</span>
        <span id="app_url_api" hidden>{{env('APP_URL_API')}}</span>
        <div class="sidehead">
            @include('layouts.sidehead')
        </div>
        <div class="content">
            <div class="sidebar">
                @include('layouts.sidebar')
            </div>
            <div class="app">
                @yield('content')
            </div>
        </div>
    @else
        <div id="fondo"></div>
        <!-- Resto de tu contenido HTML -->
        <div class="container-fluid login">
            <div class="center-content">
                <div class="col-xl-5 col-lg-7 col-md-8 col-sm-10 col-xs-12">
                    @include('auth.login')
                </div>
            </div>
        </div>
    @endif

    @livewireScripts
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/v/dt/jq-3.7.0/jszip-3.10.1/dt-1.13.5/af-2.6.0/b-2.4.1/b-colvis-2.4.1/b-html5-2.4.1/b-print-2.4.1/cr-1.7.0/date-1.5.1/fc-4.3.0/fh-3.4.0/kt-2.10.0/r-2.5.0/rg-1.4.0/rr-1.4.1/sc-2.2.0/sb-1.5.0/sp-2.2.0/sl-1.7.0/sr-1.3.0/datatables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/js/bootstrap-datepicker.min.js" integrity="sha512-LsnSViqQyaXpD4mBBdRYeP6sRwJiJveh2ZIbW41EBrNmKxgr/LFZIiWT6yr+nycvhvauz8c2nYMhrP80YhG7Cw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/locales/bootstrap-datepicker.es.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{asset('js/login.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/app.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/sidebar.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/home.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/welcome.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/sidehead.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/alert.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/table.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/filterTable.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/datepicker.js')}}" type="text/javascript"></script>
</body>
</html>