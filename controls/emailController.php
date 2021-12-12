<?php
require_once '../vendor/autoload.php';
require_once '../model/db_cred.php';

    // Citation: Code was gotten from Swift_Mailer page
    // Create the Transport
    $transport = (new Swift_SmtpTransport('smtp.gmail.com', 465,'ssl'))
    ->setUsername(EMAIL)
    ->setPassword(EMAILPASSWORD)
    ;
    
    // // Create the Mailer using your created Transport
    $mailer = new Swift_Mailer($transport);
    
    

    function sendPasswordResettLink($userEmail){


        //Development 
        // <a href="http://localhost/Final_Individual_Project/view/passwordResetPage.php" style="color:#851c2a;font-size:30px">reset your password</a>
        // When in production
        // <a href="http://localhost/Final_Individual_Project/view/passwordResetPage.php" style="color:#851c2a;font-size:30px">reset your password</a>

        global $mailer;
        $body= '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <title>Document</title>
        </head>
        <body>
            <p style="font-size:30px">Hello there, please click on the link below to reset your password</p>
            <a href="http://localhost/Final_Individual_Project/view/passwordResetPage.php" style="color:#851c2a;font-size:30px">reset your password</a>
        </body>
        </html>
        ';



        // Create a message
        $message = (new Swift_Message('Reset Password'))
            ->setFrom(EMAIL)
            ->setTo($userEmail)
            ->setBody($body,'text/html')
    ;

        // Send the message
        $result = $mailer->send($message);

        
        
        // echo "I am here";
    }
?>
