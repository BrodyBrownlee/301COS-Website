<?php
if(isset($_GET['id'])){
  $id=$_GET['id'];
}else{
  header("Location: admin.php");
  exit;
}

include 'includes/connect.php';
// include 'includes/session.php';
//updates the account with the id of the row selected to an admin 
$sql = "UPDATE users SET accounttype = 'admin' WHERE id=:id";
$unBanAccount = $pdo->prepare($sql);
$unBanAccount->bindParam(':id', $id);
$unBanAccount->execute();
//shows that the admin has been added to the user
echo'<script>alert("Admin added")</script>';
header("Location: adminusers.php");
?>