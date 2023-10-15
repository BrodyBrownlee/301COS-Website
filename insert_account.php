<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'includes/PHPMailer/src/Exception.php';
require 'includes/PHPMailer/src/PHPMailer.php';
require 'includes/PHPMailer/src/SMTP.php';

   
//if each input has something entered
    if(!preg_match('/ /',$_POST['fname']) && (!preg_match('/ /',$_POST['lname'])) && (!preg_match('/ /',$_POST['email'])) && (!preg_match('/ /',$_POST['username'])) && (!preg_match('/ /',$_POST['password'])) && (!preg_match('/ /',$_POST['confirm_password']))){
        //connect to the database
        include 'includes/connect.php';
        //checking the database for an account with the same username
        $sql = "SELECT * FROM users WHERE username = :username";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':username', $_POST['username']);

        $stmt->execute();
        //checking the rows in the database
        $count = $stmt->rowCount();
        //if there is more than one row meaning there is a username the same as the input entered
        if($count > 0)
        {
            //display error
            echo'<script>alert("Username Already Taken")</script>';
            //send back to the sign up page
            header( "Refresh: 0; URL = https://php.mmc.school.nz/301COS/brodybrownlee/2023%20Website/signup.php" ); 
        }
        else{//if username is unique
            try{
                if($_POST['password'] == $_POST['confirm_password'])
                {
                    //hash password
                 $_POST['password'] = password_hash($_POST['password'],PASSWORD_BCRYPT);
                 //sql query for inserting inputs into the database
                 $query = "INSERT INTO users
                 SET fname = :fname, lname = :lname, username = :username, password = :password, email = :email, accounttype = 'user'"; 

                $stmt = $pdo->prepare($query);
                //binding parameters for all inputs
                $stmt->bindParam(':fname', $_POST['fname']);
                $stmt->bindParam(':lname', $_POST['lname']);
                $stmt->bindParam(':username', $_POST['username']);
                $stmt->bindParam(':password', $_POST['password']);
                $stmt->bindParam(':email', $_POST['email']);
                //execute the query
                $stmt->execute();
                //return user to the sign in page as they 
                echo'<script>alert("Account Created Successfully")</script>';
                header( "Refresh: 0; URL = https://php.mmc.school.nz/301COS/brodybrownlee/2023%20Website/signin.php" ); 
                }
                else{
                    //echos error to the user and sends them back to the sign
                    echo'<script>alert("Passwords must be the same")</script>';
                    header( "Refresh: 0; URL = https://php.mmc.school.nz/301COS/brodybrownlee/2023%20Website/signin.php" ); 
                }
            }
            catch(PDOException $exception){
                echo "Error: " . $exception->getMessage();
                }       
        }
    }
    else{
        //echos error to the user and sends them back to the sign up page
        echo'<script>alert("Please fill in all fields")</script>';
        header( "Refresh: 0; URL = https://php.mmc.school.nz/301COS/brodybrownlee/2023%20Website/signup.php" );
    }
?>