
<?php
error_reporting(0);

$errors ='';

if($_POST['submit']=='Send')
{
    //keep it inside
    $email=$_POST['email'];
    $password = $_GET['passsword'];
    $con=mysqli_connect("localhost","root","","register_login");
    // Check connection
    if (mysqli_connect_errno())
    {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $query = mysqli_query($con,"SELECT * FROM user_login WHERE email='$email'")
    or die(mysqli_error($con));
    
    require 'phpmailer/PHPMailerAutoload.php';
    $mail = new PHPMailer;
    //smtp settings
    $mail->isSMTP(); // send as HTML
    $mail->Host = "smtp.gmail.com"; // SMTP servers
    $mail->SMTPAuth = true; // turn on SMTP authentication
    $mail->Username = "cosmo.store4@gmail.com"; // Your mail
    $mail->Password = 'cosmostore789'; // Your password mail
    $mail->Port = 587; //specify SMTP Port
    $mail->SMTPSecure = 'tls';                               
    $mail->setFrom($_POST['email'],$_POST['name']);
    $mail->addAddress($email); // Your mail
    $mail->addReplyTo($_POST['email'],$_POST['name']);
    $mail->isHTML(true);
    $mail->Subject='Form Submission:' .$_POST['subject'];
    $code= rand(100,999);
    mail($email, "Send Code", $message);
    $mail->Body= $message="LINK DE REACTIVACION DE CONTRASEÑA:http://localhost/web/ForgotPassword/resetpassword.php?email=code=$code";

    if (mysqli_num_rows ($query)==1)
    {
        if($mail->send())
        {
           
        }
        $query2 = mysqli_query($con, "UPDATE password SET passsword='$password' WHERE email='$email'")
        or die(mysqli_error($con)); 
        }
        else
        {
       $errors = '<center><div role="alert">Lo sentimos, su correo electrónico no existen en nuestra base de datos de registros</div></center><br>';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Recuperar Contraseña</title>


</head>
<body>
 
    <div>
    <h5>
    <center><strong>Recuperar Contraseña</strong></center><br>
            </div>
    </h5>
    
        <div>
       
        <form action="forgotpass.php" method="POST">
            
                <div>
                <?= $errors?>
                <center><input type="email"name="email" id="email"  placeholder="E-mail"></center><br>
            </div>
                </div>
                
                <center><button type="submit" name="submit" value="Send">Enviar código al correo</button></center><br>
            </div>
                
                <center><a href="form/login_vista.php">Sing in</a><center>
                       
                        
            </form>
                   
        </div>
    </div>
            
</body>
</html>








