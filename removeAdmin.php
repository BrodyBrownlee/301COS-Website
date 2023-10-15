<?php
//checks if the id value has been set
if(isset($_GET['id'])){
  //sets id variable
  $id=$_GET['id'];
}else{
  //sends user back to the admin page
  header("Location: admin.php");
  //exits statement
  exit;
}

include 'includes/connect.php';
// include 'includes/session.php';
//sets up sql statement for finding the account selected
$sql = "UPDATE users SET accounttype = 'user' WHERE id=:id";
$unBanAccount = $pdo->prepare($sql);
$unBanAccount->bindParam(':id', $id);
//executes query
$unBanAccount->execute();
//informs user admin has been removed
echo'<script>alert("Admin removed")</script>';
header("Refresh:0; URL = https://php.mmc.school.nz/301COS/brodybrownlee/2023%20Website/adminusers.php");
?>