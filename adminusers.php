<?php
//connect to database
include "headsection.php";
include 'includes/session.php';

$sql = "SELECT * FROM users";
$accountResults = $pdo->prepare($sql);
$accountResults->execute();

?>

<head>
    <title>
      Users
    </title>
</head>
  <div class="links">
    <h2>Admin</h2>
   <a href="admin.php">Appointments</a>
   <strong><a href="adminusers.php">Users</a></strong>
   <a href="adminsendemail.php">Send Announcements</a>
  </div>
  <!-- table that shows all of the users from the users table in my database and displays all of their information -->
          <div class="table-title">
            <h1>Users</h1>
          </div>
          <div class="table-content"> <!--text that sits next to the profile image-->
         <table border="1">
          <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Username</th>
            <th>Email</th>
            <th>Type</th>
            <th>Admin</th>
          </tr>
          <?php foreach($accountResults as $row){ ?>
           <tr> 
            <td><?php echo $row['fname'] ?></td>
            <td><?php echo $row['lname'] ?></td>
            <td><?php echo $row['username'] ?></td>
            <td><?php echo $row['email'] ?></td>
            <td><?php echo $row['accounttype'] ?></td>
<!-- displays buttons next to the count based on the accounttype of the user -->
            <td><?php if($row['accounttype'] == 'banned'){?><a href="unbanAccount.php?id=<?php echo $row['id']?>"><button>Un-ban</button>
              
              <?php }else if($row['accounttype'] !== 'admin'){?><a href="banAccount.php?id=<?php echo $row['id']?>"><button>Ban</button><?php }?>
             <?php if($row['accounttype'] == 'user'){?><a href="addAdmin.php?id=<?php echo $row['id']?>"><button>Admin</button>
              <?php }else if($row['accounttype'] == 'admin' && $row['username'] !== 'brodybrownlee'){?><a href="removeAdmin.php?id=<?php echo $row['id']?>"><button>Un_Admin</button><?php }?>
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