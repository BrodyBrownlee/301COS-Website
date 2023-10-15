
<?php 
include "headsection.php"; 
?>
<head>
    <title>
        Contact and Booking
    </title>
</head>
<!-- form for submitting a booking to the booking table on my database -->
        <form class="booking" action="submit_booking.php" method="post">
        <label><h2>Book an Appointment</h2></label>
        <label>Appointment Type:</label>
        <br><br>
      <input type="radio" id="contactChoice1" name="appointmentType" value="Hypnosis" />
      <label for="contactChoice1">Hypnosis</label>

      <input type="radio" id="contactChoice2" name="appointmentType" value="Smoking" />
      <label for="contactChoice2">Smoking</label>

      <input type="radio" id="contactChoice3" name="appointmentType" value="Addiction" />
      <label for="contactChoice3">Addiction</label>

      <input type="radio" id="contactChoice4" name="appointmentType" value="Habits" />
      <label for="contactChoice4">Habits</label>
      <br><br>
    <label>Appointment Time:</label>
    <br><br>
    <input type="date" id="appointment-date" name="date" required>
    <input type="time" id="appointment-date" name="time" required>
    <br><br>
        <input type="submit" value="SUBMIT" name="booking_upload">
    </form>
    
        <?php include "footsection.php"; ?>
        <script src="function.js"></script>
    </body>
</html>