<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <title>Registro</title>
    @include('parts.css')
</head>
<body style="background-color:#d9d9d9">
    <!-- <div class="aviso">
        <span></span><span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
    </div> -->
    <div class="cont-form-register">
        <form method="POST" action="/register">
            @csrf
            <div class="campo">
                <label class="my-label" for="full_name">Nombre Completo <span class="req">*</span></label>
                <input type="text" name="full_name" id="full_name" required="true">
                @error('full_name')<span class="error-msg">{{$message}}</span>@enderror
            </div>
            <div class="campo">
                <label class="my-label" for="name">Nombre de Usuario <span class="req">*</span></label>
                <input type="text" name="name" id="name" required="true">
                @error('name')<span class="error-msg">{{$message}}</span>@enderror
            </div>
            <div class="campo">
                <label class="my-label" for="email">Correo Electrónico <span class="req">*</span></label>
                <input type="email" name="email" id="email">
                @error('email')<span class="error-msg">{{$message}}</span>@enderror
            </div>
            <div class="campo">
                <label class="my-label" for="password">Contraseña <span class="req">*</span></label>
                <input type="password" name="password" id="password" required="true">
                @error('password')<span class="error-msg">{{$message}}</span>@enderror
            </div>
            <div class="campo">
                <label class="my-label" for="password_confirmation">Confirmar Contraseña <span class="req">*</span></label>
                <input type="password" name="password_confirmation" id="password_confirmation" required="true">
                @error('password_confirmation')<span class="error-msg">{{$message}}</span>@enderror
            </div>
            <div class="campo">
                <label class="my-label">Sexo</label>
                <select class="browser-default" name="sex" id="sex">
                    <option value="M">Masculino</option>
                    <option value="F">Femenino</option>
                </select>
            </div>
            <div class="campo">
                <label class="my-label" for="date_birth">Fecha de Nacimiento <span class="req">*</span></label>
                <input type="date" name="date_birth" id="date_birth" required="true">
                @error('date_birth')<span class="error-msg">{{$message}}</span>@enderror
            </div>
            <div>
                <input class="btn btn-app" type="submit" value="Registrarse">
            </div>
        </form>
    </div>
</div>
</body>
</html>