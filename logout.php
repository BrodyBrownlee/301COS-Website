<?php
//starts session to access session variables
  session_start();
  //sets session variable to null to end to current session id
  $_SESSION['idpoopydoopy34'] = null;
  //tells user they have been logged out and sends them back to the home page
  header( "Refresh: 0; URL = https://php.mmc.school.nz/301COS/brodybrownlee/2023%20Website/index.php" );
  echo'<script>alert("You have been Logged Out")</script>';
?>