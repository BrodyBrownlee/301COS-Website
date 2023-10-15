<?php
 include 'includes/connect.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require 'includes/PHPMailer/src/Exception.php';
require 'includes/PHPMailer/src/PHPMailer.php';
require 'includes/PHPMailer/src/SMTP.php';

//if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
//checks if the email is a valid email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email address";
        header( "Refresh: 1; URL = https://php.mmc.school.nz/301COS/brodybrownlee/2023%20Website/index.php" );
        exit;   
      
    }
    //selecting a value in the table where the email entered already exist 
    $sql = "SELECT COUNT(*) FROM emailList WHERE  email = :email";
    $stmt = $pdo->prepare($sql);
    //binds email value 
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    // $pdo-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//if there is no email that is the same as the entered email 
    if($result["COUNT(*)"] == 0)
    {
        //insert email into the table
        $sql = "INSERT INTO emailList SET email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        //sets the values for the reciever email and reciever name(not yet relevant)
        $receiverEmail = $email;
        //creates a new phpmailer 
        $mail = new PHPMailer(true);
        $mail->CharSet =  "utf-8";
        $mail->IsSMTP();
        // dissable SMTPAutoTLS  
        $mail->SMTPAutoTLS = false;    
        // sets GMAIL as the SMTP server
        $mail->Host = "smtp.mmc.school.nz";
        // set the SMTP port for the GMAIL server
        $mail->Port = 25;
        // the adress the email is from
        $mail->From='brodybrownlee@mmc.school.nz';
        // Name of the sender
        $mail->FromName='TraceyBHypnotherapy(DoNotReply)';
        //address of the sender which is equal to the inputted email 
        $mail->AddAddress($receiverEmail);
        $mail->Subject  =  'Thank you for Signing Up';
        $mail->IsHTML(true);
        $mail->Body = '<p>Thank you for signing up to TraceyBHynotherapy</p></br><p> You will recieve all the latest updates and news as they become available.';
    
        if($mail->Send())
        {
            //informs user the email has been added and sends them back to the home page
            echo '<script>alert("Success");</script>';
            header("Refresh: 1; URL = https://php.mmc.school.nz/301COS/brodybrownlee/2023%20Website/index.php");
        }
        else
        {
            //informs user of a mail error
            echo "Mail Error - >".$mail->ErrorInfo;
            echo "Please refresh the page, and if the problem persists contact an admin.";
        }
    }
    else{
        //informs user their email is already in the database
        echo '<script>alert("Email Already Exists");</script>';
        header("Refresh: 1; URL = https://php.mmc.school.nz/301COS/brodybrownlee/2023%20Website/index.php");
        exit;  
    } 
}
  
?>