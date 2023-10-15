<?php
if(isset($_GET['id'])){
  $id=$_GET['id'];
}else{
  header("Location: admin.php");
  exit;
}

include 'includes/connect.php';

//deletes the booking id from the row 
$sql = "DELETE FROM booking WHERE id=:id";
$banAccount = $pdo->prepare($sql);
$banAccount->bindParam(':id', $id);
$banAccount->execute();
//informs user appointment has been deleted
echo"<script>alert('Appointment Deleted ID: ' + '$id')</script>";
header("Refresh:0; URL = https://php.mmc.school.nz/301COS/brodybrownlee/2023%20Website/admin.php");
?>