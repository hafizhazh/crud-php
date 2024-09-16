<?php 

use PHPMailer\PHPMailer\PHPMailer;
require 'vendor/autoload.php';
$mail = new PHPMailer(true);

//server setting
$mail->SMTPDebug = 2;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'hafizhfalsss@gmail.com';                     //SMTP username
    $mail->Password   = 'jpzsfabpnfgszoyf';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;   

      $mail->setFrom('hafizhfalsss@gmail.com', 'dari sumengko');
    $mail->addAddress($_POST['email_penerima']);
    $mail->addReplyTo('hafizhfalsss@gmail.com', 'dari sumengko');   
    
    $mail->Subject =$_POST['subjek'];
    $mail->Body    =$_POST['pesan'];//Add a recipient

    if($mail->send()){
       echo "
       <script>
       alert('email berhasil di kirim');
       document.location.href='email.php';
       </script>
       ";
     }else {
       echo "
       <script>
       alert('email gagal di kirimkan ');
       document.location.href='email.php';
       </script>
       ";
    }    
