<?php

$name="Juanito Mendez";
$email="juan.miguel.mc@gmail.com";
$details="Bailó Bertha las calmadas";

// Preparar mensaje de correo a enviar
$email_body ="";
$email_body.="Nombre: ".$name."\n";
$email_body.="Email: ".$email."\n";
$email_body.="Sugerencia: ".$details."\n";

require("inc/class.phpmailer.php");
include("inc/class.smtp.php");

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'mail.soltix.com.mx';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'practica@soltix.com.mx';                 // SMTP username
$mail->Password = 'telecom555$';                           // SMTP password
//$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 26;                                    // TCP port to connect to

$mail->setFrom($email, $name);
$mail->addAddress('jmmendez@ucc.mx', 'Juan Miguel Mendez');     // Add a recipient

$mail->isHTML(false);                                  // Set email format to HTML

$mail->Subject = 'Correo de prueba';
$mail->Body    = $email_body;

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}