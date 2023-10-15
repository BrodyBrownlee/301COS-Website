<?php
    session_start(); 
    include 'includes/connect.php';
    if(!preg_match('/ /',$_POST['username']) && (!preg_match('/ /',$_POST['password'])))
    {
    //if something has been entered into both fields
      if ($_POST['username'] && $_POST['password']){
        //selects the user that has the same username that has been entered
        $sql = "SELECT * FROM users WHERE username = :username";
        $stmt = $pdo -> prepare($sql);
        $stmt->bindParam(':username', $_POST['username']);
        $stmt->execute();
        //fetches the row from the query
        $results = $stmt -> fetch(PDO::FETCH_ASSOC);
          if($stmt -> rowcount() > 0){
             $stored_password = $results["password"];
            //php if the password is correct
                if(password_verify($_POST['password'],$stored_password)){
                  $_SESSION['idpoopydoopy34'] = $results["id"];
                  //tells user they have logged in successfully adn sends them back to index.php
                  echo'<script>alert("Log in Successful")</script>';
                  header("Refresh: 0; URL = https://php.mmc.school.nz/301COS/brodybrownlee/2023%20Website/index.php");
                }
                //if the password isn't correct
                else{
                  //informs user password is incorrect and redirects them to the sign in page
                  echo'<script>alert("Password Incorrect")</script>';
                  header("Refresh: 0; URL = https://php.mmc.school.nz/301COS/brodybrownlee/2023%20Website/signin.php");
                }
          }
          //if the account does not show up in the database
          else
          {
            echo'<script>alert("Invalid Account")</script>';
            header("Refresh: 0; URL = https://php.mmc.school.nz/301COS/brodybrownlee/2023%20Website/signin.php") ;
          }
      }
      //if the user has filled in the password and username with spaces
      else{
          //informs user to fill in all the fields and redirects them back to the sign in page
          echo'<script>alert("Please Complete all Fields")</script>';
          header("Refresh: 0; URL = https://php.mmc.school.nz/301COS/brodybrownlee/2023%20Website/signin.php") ;
      }
    }//if the user hasn't submitted anything
    else{
      //informs user to fill in all the fields and redirects them back to the sign in page
      echo'<script>alert("Please fill in all fields")</script>';
      header("Refresh: 0; URL = https://php.mmc.school.nz/301COS/brodybrownlee/2023%20Website/signin.php");
    }

?>