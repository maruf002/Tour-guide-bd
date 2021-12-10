<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    {{-- <title>@yield('title') - {{ config('app.name', 'Laravel') }}</title> --}}

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
  
	<link href="{{ asset('assets/frontend/common-css/bootstrap.css') }}" rel="stylesheet">
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
	<link href="{{ asset('assets/frontend/common-css/ionicons.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/frontend/layout-1/css/styles.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/frontend/layout-1/css/responsive.css') }}" rel="stylesheet">
  @stack('css')
</head>
<body>
 
   @include('frontend.partial.header')
   


    @yield('content')


    @if(Request::is('/'))
    

    @include('frontend.partial.footer')

    @endif
   
	<script src="{{ ("assets/frontend/common-js/jquery-3.1.1.min.js") }}"></script>
	<script src="{{ ("assets/frontend/common-js/tether.min.js") }}"></script>
	<script src="{{ ("assets/frontend/common-js/bootstrap.js") }}"></script>
	<script src="{{ ("assets/frontend/common-js/scripts.js") }}"></script>
  
    @stack('js')
	 
</body>
</html>
