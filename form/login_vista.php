<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    
    
</head>
        <style>
			body{
				background-image: url(../fondo4.png);
                background-position: center center;
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: cover;
                background-color: #66999;
			}
		</style>

<body >

    
<div>
        
        <form action="iniciarSesion.php" method="post">
            <div><center><h1>Ingrese</h1></center></div><br>
            <div>
                <label></label>
                <center><input type="text" style="border-radius: 5px;" placeholder="Nombre Usuario" name="username" maxlength="20"></center><br>
            </div>
            <div>
                <label></label>
                <center><input type="password" style="border-radius: 5px;" placeholder="Contraseña" name="password" maxlength="50"></center><br>
            </div>
            
            <center><button type="submit">Entrar<label></label></button></center>
        </form>
    </div>
</body>
</html>