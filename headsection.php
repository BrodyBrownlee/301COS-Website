<?php
session_start();
//start a session
//Check to see if the user has logged in
//If they haven't session variable will not exist and
//they will be directed back to the login form

//connect to database
include 'includes/connect.php';

$sql = "SELECT * FROM users WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id',$_SESSION['idpoopydoopy34']);
$stmt->execute();
$currentAccountResult = $stmt->fetch(PDO::FETCH_ASSOC);  
?>
        <link href="style.css" rel="stylesheet" type="text/css">
        <link rel="icon" href="images/icon.png">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat|EB Garamond">
    </head>
    <body>
    <nav>    
<?php
// checks if the user is signed in 
         if($_SESSION['idpoopydoopy34'] == null || !isset($_SESSION['idpoopydoopy34'])){ ?>
<!-- if not displays the sign in button -->
           <div class="dropdown">
            <button id="dropbtn" onclick="menubutton()" class="dropbtn" title="Menu"> <!-- button for the dropdown menu, using an image to better represent that it is a menu--> 
           <img class="menubtn" src="images/menu-icon.png" alt="menu-button">
            </button>
            <div id="dropdown" class="dropdown-content"> <!-- after clicking on the menu, links drop down, added classes to allow for animation-->
              <a href="index.php">Home</a>
              <a href="hypnosis.php">Hypnosis</a>
              <a href="about.php">About</a>
              <a href="childrenBedwetting.php">Children</a>
              <a href="teenagerConfident.php">Teenagers</a>
              <a href="adultThinking.php">Adults</a>
            </div>
          </div>
          <div class="signin"><!-- using a class to float the contact and booking icon to the right-->
          <a href="signin.php" title="Contacts and Booking">
            <strong>SIGN IN</strong>
          </a> 
        </div> 
        <?php
         }
         else{ ?>
         <!-- otherwise it displays the logout button as well as the users username, and if they are an admin displays the admin panel -->
         <div class="dropdown">
            <button id="dropbtn" onclick="menubutton()" class="dropbtn" title="Menu"> <!-- button for the dropdown menu, using an image to better represent that it is a menu--> 
           <img class="menubtn" src="images/menu-icon.png">
            </button>
            <div id="dropdown" class="dropdown-content"> <!-- after clicking on the menu, links drop down, added classes to allow for animation-->
              <a href="index.php">Home</a>
              <a href="hypnosis.php">Hypnosis</a>
              <a href="about.php">About</a>
              <a href="childrenBedwetting.php">Children</a>
              <a href="teenagerConfident.php">Teenagers</a>
              <a href="adultThinking.php">Adults</a>
              <?php if($currentAccountResult['accounttype'] == 'admin'){ ?>
                <a href="admin.php">Admin</a>
                <?php }?>
            </div>
          </div>
          <div class="username"><?php echo $currentAccountResult['username']; ?></div>
          <div class="services" ><!-- using a class to float the contact and booking icon to the right-->
          <a href="services.php" title="Contacts and Booking">
            <strong>SERVICES</strong>
            </a> 
            </div> 
          <div class="signin" style="margin-left:calc(100% - 120px);"><!-- using a class to float the contact and booking icon to the right-->
          <a href="logout.php" title="Contacts and Booking">
            <strong>LOGOUT</strong>
          </a> 
        </div> 
        <?php
         }?>
      </nav>  
      <div class="grid-container"> <!-- grid container layout --> 
      <div class="banner">
        <img src="images/banner.jpg" title="Image 1" alt="Image 1">
        </div>  
      <!--end of nav/banner -->