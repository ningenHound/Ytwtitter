<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <title>Iniciar Sesión</title>
    @include('parts.css')
</head>
<body class="fondo-login">
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <span class="error-msg">{{$error}}&nbsp;<i class="material-icons" style="cursor:pointer" onclick="this.parentElement.style.display='none';">close</i></span>
        @endforeach
    @endif
    <div class="row container cont-login">
        <form method="POST" action="/login">
            @csrf
            <div>
                <label class="my-label">Nombre de Usuario</label>
                <input type="text" name="name" id="name" required="true">
            </div>
            <div>
                <label class="my-label">Contraseña</label>
                <input type="password" name="password" id="password" required="true">
            </div>
            <div>
                <input class="btn btn-app" type="submit" value="Ingresar">
            </div>
        </form>
        <h6>¿No eres usuario aún? <a href="/register">Regístrate</a></h6>
    </div>
</body>
</html>