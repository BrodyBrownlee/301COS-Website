<?php
// include 'includes/session.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require 'includes/PHPMailer/src/Exception.php';
require 'includes/PHPMailer/src/PHPMailer.php';
require 'includes/PHPMailer/src/SMTP.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $emailBody = '<p>'. $_POST['emailtext'] .'</p>';
        $emailSubject = $_POST['emailsubject'];
        $sql = "SELECT * FROM emailList";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
       
        $mail = new PHPMailer(true);
        $mail->CharSet =  "utf-8";
        $mail->IsSMTP();
        // disable SMTPAutoTLS  
        $mail->SMTPAutoTLS = false;    
        // sets GMAIL as the SMTP server
        $mail->Host = "smtp.mmc.school.nz";
        // set the SMTP port for the GMAIL server
        $mail->Port = 25;
        // the adress the email is from
        $mail->From='brodybrownlee@mmc.school.nz';
        // Name of the sender
        $mail->FromName='TraceyBHypnotherapy(DoNotReply)';
        //for each row of emails selected in the emailList table in my database
        foreach($stmt as $row) {
            //add the email to a BCC which will send an email to all emails but they won't be able to see who else was cc'd
            $mail->AddBCC($row['email']);
        }
        //sets subject and body to what was inputted in the form 
            $mail->Subject  =  $emailSubject;
            $mail->IsHTML(true);
            $mail->Body = $emailBody;
            if($mail->Send())
            {
                //tells the user the email was sent
                echo '<script>alert("Success");</script>';
                header('Refresh:0; URL = https://php.mmc.school.nz/301COS/brodybrownlee/2023%20Website/index.php');
            }
            else
            {
                //sends an error and exits the php
                echo "Mail Error - >".$mail->ErrorInfo;
                echo "Please refresh the page, and if the problem persists contact an admin.";
                exit();
            }
    }
    else{
        //tells user to fill in fields and returns them to the index
        echo'<script>alert("Please fill in all fields")</script>';
        header('Refresh:0; URL = https://php.mmc.school.nz/301COS/brodybrownlee/2023%20Website/index.php');
        exit();
    }
   
?>