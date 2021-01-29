
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>    
</head>
<body >
    
<div>                
  <div class="container">
    <h1>Regístrate</h1>
    <p>Complete este formulario para crear una cuenta.</p>
    <hr>

    <label for="text"><b>Nombre Usuario</b></label>
    <input type="text" style="border-radius: 5px;" placeholder="Nombre Usuario" name="usr" id="usuarioLogin" required>

    <label for="text"><b>Nombre</b></label>
    <input type="text" style="border-radius: 5px;" placeholder="Nombre" name="nombre" id="nombre" required>

    <label for="text"><b>Apellido</b></label>
    <input type="text" style="border-radius: 5px;" placeholder="Apellido" name="apellido" id="apellido" required>

    <label for="tel"><b>Teléfono</b></label>
    <input type="tel" style="border-radius: 5px;" name="telefono" id="telefono" placeholder="Número Telefónico" required>
    

    <label for="email"><b>Email</b></label>
    <input type="email" style="border-radius: 5px;" placeholder="Email" id="email" name="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" style="border-radius: 5px;" name="pass" id="passwordLogin"  placeholder="Contraseña" required>

    <center><button onclick="comprobarDatosRegistro()" class="col s12 btn btn-large waves-effect teal darken-1">Registrarse<label></label></button></center><br>
            
            <center><em>¿Ya tienes cuenta? <a onclick="iniciarSesion()">Iniciar Sesión</a></em></center><br>
            <center><a class="btn teal darken-1" onclick="iniciarSesion()">Volver</a>
            <a class="btn teal darken-1" onclick="home()">Inicio</a></center>
               

            <div class="section"></div>
  </div>

    
</div>    
</body>
</html>