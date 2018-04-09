<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'TimeSheet') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="/css/app.css" >
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <!-- Styles -->
    
</head>
<body>
@include('layouts._includes._nav')
    <div id="app">
        @if (Auth::guest())
            @yield('content')
        @else
        <div class="row">
            <div class="col-md-2">
                @include('layouts._includes._nav_lateral')
            </div>
           <div class="col-md-9">
                @if(Session::has('flash_msg'))
                       <div class="row">
                            <div class="col-md-8 col-md-offset-1">
                                <div align="center" class=" alert  {{  Session::get('flash_msg')['class'] }} " role="alert">
                                    <p>{{ Session::get('flash_msg')['msg']}}</p>
                                </div>
                            </div>
                        </div>
                    
                @endif
                @yield('content')
            </div>
        </div>  
        @endIf   
    </div>
    <script type="text/javascript" src="/js/jquery.min.js"></script>
    <script type="text/javascript" src="/js/app.js"></script>
	<script type="text/javascript" src="/js/valida.js"></script>
    <!-- Scripts -->
    @yield('javascript')
</body>
</html>
