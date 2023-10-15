<?php

if(isset($_GET['id'])){
  $id=$_GET['id'];
}else{
  header("Location: admin.php");
  exit;
}

include 'includes/connect.php';
//update accounttype of the user in the selected row to user
$sql = "UPDATE users SET accounttype = 'user' WHERE id=:id";
$unBanAccount = $pdo->prepare($sql);
$unBanAccount->bindParam(':id', $id);
$unBanAccount->execute();
//tell user the account has been unbanned and send them to the admin users page
echo'<script>alert("Un-banned")</script>';
header('Refresh:0; URL = https://php.mmc.school.nz/301COS/brodybrownlee/2023%20Website/adminusers.php');
?>