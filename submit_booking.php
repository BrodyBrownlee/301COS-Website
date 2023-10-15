<?php 
  // if(!preg_match('/ /',$_POST['fname']) && (!preg_match('/ /',$_POST['lname'])) && (!preg_match('/ /',$_POST['email'])) && (!preg_match('/ /',$_POST['username'])) && (!preg_match('/ /',$_POST['password'])) && (!preg_match('/ /',$_POST['confirm_password']))){
    //connect to the database
    session_start();

    include 'includes/connect.php';
//checks if the user is signed in
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    if($_SESSION['idpoopydoopy34'] == null || !isset($_SESSION['idpoopydoopy34'])){
      //if not give a message to sign in
      echo'<script>alert("Please sign in before making a booking")</script>';
      header("Location: services.php"); 
      // exit();
    } else if (empty($_POST['appointmentType']) || empty($_POST['date']) || empty($_POST['time'])) {
        echo'<script>alert("Please fill in all fields")</script>';
        header("Location: services.php"); 
        // exit();
      }
      else{
        //declares varaibles for each input
      $bookingType = $_POST['appointmentType'];
      $bookingDate = $_POST['date'];
      $bookingTime = $_POST['time'];
      $sender = $_SESSION['idpoopydoopy34'];
      //sets SQL query
      $query = "INSERT INTO booking 
      SET booking_type = :appointmentType, booking_date = :date, booking_time = :time, userid = :userID";
      $bookingInput = $pdo->prepare($query);
      //binds parameters
      $bookingInput->bindParam(':appointmentType',$_POST['appointmentType']);
      $bookingInput->bindParam(':date',$_POST['date']);
      $bookingInput->bindParam(':time',$_POST['time']);
      $bookingInput->bindParam(':userID',$_SESSION['idpoopydoopy34']);
      //execute the query
      $bookingInput->execute();
      //informs user the booking is successful  
      echo"<script>alert('Successful ' + '$bookingType' + ' booking for ' + '$bookingDate'  + ' at' + ' $bookingTime')</script>";
      header('Refresh:0; URL = https://php.mmc.school.nz/301COS/brodybrownlee/2023%20Website/index.php');
      // exit();
      }
    }
?>