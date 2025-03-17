<?php
//connect to database
include "headsection.php";
include 'includes/session.php';
?>

<head>
    <title>
      Users
    </title>
</head>
  <div class="links">
    <h2>Admin</h2>
   <a href="admin.php">Appointments</a>
   <a href="adminusers.php">Users</a>
   <strong><a href="adminsendemail.php">Send Announcements</a></strong>
  </div>
  <form class="send-email" action="admin-submitemail.php" method="post">
          <div class="form-title">
            <label><h1>Send Email</h1></label>
          </div>
          <!-- input form for sending emails to the users from the emaillist table -->
          <div class="form-content">
            <label for="emailSubject">Email Subject</label><br><br>
            <input style="width: 100%;padding: 10px;border-radius: 5px;"type="text" name="emailsubject" id="emailsubject" placeholder="Enter Email subject" required>
            <br><br>
            <label for="emailtext">Email Body:</label>
            <br><br>
            <textarea name="emailtext" type="text" id="emailtext" placeholder="Enter Email text here" ></textarea>
            <br><br>
            <input type="submit" value="SUBMIT" name="sendemail">
          </div>
  </form>
          <?php include "email.php"; ?>
          <?php include "footsection.php"; ?>
    </body>
    <script src="function.js"></script>
</html>