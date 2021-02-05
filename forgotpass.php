<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'conexion.php';

if (isset($_POST['email'])) {

    $emailTo = $_POST['email']; 
    $mail = new PHPMailer(true);                             
    $code = uniqid(true); 
    $query = mysqli_query($bd,"INSERT INTO resetpasswords (code, email) VALUES('$code','$emailTo')"); 
    if (!$query) {
       exit('Error'); 
    }
    try {
        
        $mail->SMTPDebug = 0;    
        $mail->isSMTP();                                     
        $mail->Host = 'smtp.gmail.com';  
        $mail->SMTPAuth = true;                              
        $mail->Username = "cosmo.store4@gmail.com";                
        $mail->Password = 'cosmostore789';                                                
        $mail->SMTPSecure = 'ssl';                                                        
        $mail->Port = 465;
        $mail->setFrom('email@gmail.com', 'Cosmo Games'); 
        $mail->addAddress($emailTo, '');    
        $mail->addReplyTo('no-replay@example.com', 'No Replay');  
        $url = "http://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']). "/resetPassword.php?code=$code"; 
        $mail->isHTML(true);                                 
        $mail->Subject = 'Su enlace de restablecimiento de contraseña';
        $mail->Body    = "<h1> Solicitaste restablecer la contraseña </h1>
              Haga clic <a href='$url'>en este enlace</a> para cambiar tu contraseña.";
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        
        $mail->SMTPOptions = array(
            'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
            )
        );


        $mail->send();
        echo '<center><h1>El mensaje ha sido enviado </h1></center>';
    } catch (Exception $e) {
        echo 'No se pudo enviar el mensaje. Error de envío:', $mail->ErrorInfo;
    }

    exit(); 
}

?>

<form method="post">
<h5>
    <center><strong>Recuperar Contraseña</strong></center>
            
    </h5>
<center><input type="email" name="email" placeholder="Email" autocomplete="off">
    <br><br>
    <input  type="submit" name="submit" value="Enviar código al correo"></center>
     
</form>














