
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>    
</head>
<body >
    
<div>                
        
            <div><center><h1>Regístrate</h1></center></div><br>
            
            
            <div>
                <label></label>
                <center><input type="text" style="border-radius: 5px;" placeholder="Nombre Usuario" name="usr" id="usuarioLogin" ></center><br>
                
            </div>
            <div>
                <label></label>
                <center><input type="text" style="border-radius: 5px;" placeholder="Nombre" name="nombre" id="nombre" ></center><br>
                
            </div>
            <div>
                <label></label>
                <center><input type="text" style="border-radius: 5px;" placeholder="Apellido" name="apellido" id="apellido"></center><br>
                
            </div>
            <div>
                <label></label>
                <center><input type="email" style="border-radius: 5px;" placeholder="Email" id="email" name="email"><center><br>
                
            </div>
            <div>
                <center><input type="tel" style="border-radius: 5px;" name="telefono" id="telefono" placeholder="Número Telefónico"><center><br>
            </div>

            <div>
                <center><input type="password" style="border-radius: 5px;" name="pass" id="passwordLogin"  placeholder="Contraseña"><center><br>
            </div>

            
            <center><button onclick="comprobarDatosRegistro()" class="col s12 btn btn-large waves-effect teal darken-1">Registrarse<label></label></button></center><br>
            
            <center><em>¿Ya tienes cuenta? <a onclick="iniciarSesion()">Iniciar Sesión</a></em></center><br><br>

            <center><a class="btn teal darken-1" onclick="iniciarSesion()">Volver</a>
            <a class="btn teal darken-1" onclick="home()">Inicio</a></center>
               

            <div class="section"></div>
    <div class="section"></div>
    
    </div>    
</body>
</html>