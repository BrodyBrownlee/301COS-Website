<?php
if(isset($_GET['id'])){
  $id=$_GET['id'];
}else{
  header("Location: adminusers.php");
  exit;
}

include 'includes/connect.php';
//updates the user for the id of the selected row to have the banned accounttpe
$sql = "UPDATE users SET accounttype = 'banned' WHERE id=:id";
$banAccount = $pdo->prepare($sql);
$banAccount->bindParam(':id', $id);
$banAccount->execute();
//informs user the account has been banned
echo'<script>alert("Banned")</script>';
header('Refresh:0; URL = https://php.mmc.school.nz/301COS/brodybrownlee/2023%20Website/adminusers.php');
?>