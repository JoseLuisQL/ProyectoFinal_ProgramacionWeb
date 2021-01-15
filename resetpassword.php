<?php 
include('login1.php') 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>

  

</head>
<body>
<center><div>
          <div>
              <div>
                <div>
                    <h5>
                        <strong>Nueva contraseña</strong>
                    </h5>
                    <div>
                        <form action="resetpassword.php" method="POST">
                        
                            <div>
                                <div>
                            <div>
                                <input type="password" name="password" id="password" placeholder="Nueva contraseña">
                            </div>
                            <button type="submit" name="submit">Regístrate</button>                           
                            <hr>
                            <em>¿Ya tienes cuenta? <a href="login_vista.php">Inicia Sesión</a></em>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div></center>

</body>
</html>

