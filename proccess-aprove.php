<?php

use PHPMailer\PHPMailer\PHPMailer;
$send_email = TRUE;
$recipent = $_GET['email'];
$emailContent = $_POST['message'];
var_dump($recipent);
// var_dump[$recipent];
// error_reporting(E_ALL); 
// ini_set("display_errors", 1); 
// ----------- SEND MAIL  ----------- 
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';

if ($send_email) {
    $mail = new PHPMailer;
    $mail->FromName = 'Wirtschaftsverband';
    $mail->addAddress("johnnybravo471@gmail.com", "Jaranika");   
    $mail->isHTML(true);      
    $mail->From = 'nkajevic@cimet.rs';                        
    $mail->Subject = 'Respond by Nomik';

  
    $message = "<html><head><meta http-equiv='Content-Type' content='text/html; charset=utf-8'/><title></title></head><body><table><font face='Arial,Verdana'><tr><td style='color:#E30613;font-size:16px'>"
            . "You're already a member of our company!<br/><br/>
            </td></tr>
            </tr></font></table></body></html>";

    $mail->Body = $message;
    $mail->AltBody = '';

    $mail->CharSet = "UTF-8";
    if ($mail->send()) {
        $res["response"] = 1;
        $res['error'] = 'none';
        var_dump($recipent);
        // header("Location: https://unsere-feuerwehr.at/politicari/index.php");
    } else {
    
        $res["response"] = 0;
        $res['error'] = 'Mail error: ' . $mail->ErrorInfo;
        
    }
}
echo JSON_encode($res);
