<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <title>Iniciar Sesión</title>
    @include('parts.css')
</head>
<body class="fondo-login">
    <!-- <div class="aviso">
        <span></span><span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
    </div> -->
    <div class="cont-login">
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
            <div>
                <a href="/register">Registrarse</a>
            </div>
        </form>
    </div>
</div>
</body>
</html>