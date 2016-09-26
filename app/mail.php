<?php

if(isset($_POST['fullname'])) {

    $fullname = "ФИО:\r\n" . $_POST['fullname'] . "\r\n\r\n";
    $phone = "Телефон:\r\n" . $_POST['phone'] . "\r\n\r\n";

    $from_email = 'sharipkanov@gmail.com'; //sender email
    $recipient_email = 'sharipkanov@gmail.com'; //recipient email
    $subject = 'Отклик на вакансию с сайта'; //subject of email
    $message = ''; //message body

    $message .= $fullname . $phone;

    $boundary = md5("sanwebe");


//header
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "From:".$from_email."\r\n";
    $headers .= "Content-Type: multipart/mixed; boundary = $boundary\r\n\r\n";

//plain text
    $body = "--$boundary\r\n";
    $body .= "Content-Type: text/plain; charset=utf-8\r\n";
    $body .= "Content-Transfer-Encoding: base64\r\n\r\n";
    $body .= chunk_split(base64_encode($message));


    $sentMail = @mail($recipient_email, $subject, $body, $headers);

    if($sentMail) {
        header('Location: /');
    }else{
        die('Could not send mail! Please check your PHP mail configuration.');
    }
}