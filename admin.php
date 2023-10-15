<?php 
//connect to database
include 'includes/connect.php';
//includes the headsection.php
include "headsection.php";
//if the current account is not an  account
include 'includes/session.php';

$sql = "SELECT * FROM booking ORDER BY booking_date ASC";
$bookingResults = $pdo->prepare($sql);
$bookingResults->execute();
?>
<head>
    <title>
      About
    </title>
</head>
  <div class="links">
    <h2></h2>
    <strong><a href="admin.php">Appointments</a></strong>
    <a href="adminusers.php">Users</a>
    <a href="adminsendemail.php">Send Announcements</a>
  </div>
  <!-- table that displays all of the bookings that are in the database and seperates each column and row in the table -->
          <div class="table-title">
            <h1>Appointments</h1>
          </div>
          <div class="table-content">
          <table border="1">  
         <th>Booking ID</th>
         <th>Booking Type</th>
            <th>Booking Date</th>
            <th>Booking Time</th>
            <th>User ID</th>
            <th>Remove</th>
         <?php foreach($bookingResults as $row){ ?>
           <tr> 
           <td><?php echo $row['id'] ?></td>
            <td><?php echo $row['booking_type'] ?></td>
            <td><?php echo $row['booking_date'] ?></td>
            <td><?php echo $row['booking_time'] ?></td>
            <td><?php echo $row['userid'] ?></td>
<!-- gives the admin the option to delete the booking and sends the rows booking id when the button is pressed -->
            <td><a href="deleteAppointment.php?id=<?php echo $row['id']?>"><button>Delete Appointment</button>
            </td>
            </tr>
          <?php } ?>
         </table>
        </div>    
          <?php include "email.php"; ?>
          <?php include "footsection.php"; ?>
    </body>
    <script src="function.js"></script>
</html>