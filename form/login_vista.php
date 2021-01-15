<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
			body{
                background-position: center center;
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: cover;
                background-color: #66999;
			}
	</style>
</head>
<body>
    
<div>
        
        
            <div><center><h1>Ingrese</h1></center></div><br>
            <div>
                <label></label>
                <center><input type="text" style="border-radius: 5px;" placeholder="Usuario" name="usr" id="usuarioLogin" maxlength="50"></center><br>
            </div>
            <div>
                <label></label>
                <center><input type="password" style="border-radius: 5px;" placeholder="password"  name="pass" id="passwordLogin" maxlength="50"></center><br>
            </div>
            <div>
                <center><div>
                <input type="checkbox" name="checkbox"  id="checkbox" required>
                <label for="checkbox">Recuérdame</label>
                </div></center>
            </div>
            <div>
                <center><a href="forgotpass.php">¿Se te olvidó tu contraseña?</a></center>
            </div>
            <center><button onclick="comprobarDatos()" class="col s12 btn btn-large waves-effect teal darken-1">Iniciar Sesión</button></center>
            <center><p>¿No es un miembro?
            <a onclick="registrarse()">Registrarse</a>
            </p></center>
        
    </div>
</body>
</html>