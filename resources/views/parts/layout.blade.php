<!DOCTYPE html>
<html lang="es">
<head>
<title>Y para twittear</title>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="description" content="app para envío de mensajes cortos (clon de twitter)">
    <meta name="keywords" content="test, educacion, web, software, desarrollo, paraguay">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@include('parts.css')
@yield('css')
</head>
<body>

@include('parts.sidenav')

@yield('content')

@include('parts.js')
@yield('js')
<div id="spinner">
  <span class="spinner-msg">cargando</span>
</div>
</body>
</html>