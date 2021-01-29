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
        <div class="section"></div>
        
        <div><center><h1>Ingrese</h1></center></div><br>
                      
        <div class="imgcontainer">
             <center><img src="miniatura.png" alt="Avatar" class="avatar"></center>
        </div>

        <div class="container">
            <label for="uname"><b>Username</b></label>
            <input type="text" placeholder="Usuario" id="usuarioLogin" maxlength="50" name="usr" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Password" id="passwordLogin" maxlength="50" name="pass" required>

            <center><button onclick="comprobarDatos()" class="col s12 btn btn-large waves-effect teal darken-1">Iniciar Sesión</button></center>
            <label>
                 <center><div>
                    <input type="checkbox" name="checkbox"  id="checkbox" required>
                    <label for="checkbox">Recuérdame</label>
                    </div></center>
            </label>
            <div>
                <center><a href="forgotpass.php">¿Se te olvidó tu contraseña?</a></center>
            </div>
        </div>
        <center><p>¿No eres un miembro?
            <a onclick="registrarse()">Registrarse</a>
            </p></center>

            <div class="section"></div>
   

        
    </div>

</body>
</html>