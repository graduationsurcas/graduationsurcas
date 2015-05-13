<?php

class Services {
    
    
      public static function sendEmail($admin_email, $email_subject, $mail_text) {


        $to = $admin_email;
        $email_body = $mail_text;
        $headers = "From: not-rplay@oman-tourism-guide.com\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=utf-8\r\n";

        $resault = mail($to, $email_subject, $email_body, $headers);

        if ($resault) {

            }

        return $resault;
    }
    
    
}