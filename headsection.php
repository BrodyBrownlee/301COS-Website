<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Title</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to your CSS file -->
    <link href="style.css" rel="stylesheet" type="text/css">
    <link rel="icon" href="images/icon.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat|EB Garamond">
</head>
<body>
    <nav>    
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
    </nav>
      <div class="grid-container"> <!-- grid container layout --> 
      <div class="banner">
        <img src="images/banner.jpg" title="Image 1" alt="Image 1">
        </div>  
      <!--end of nav/banner -->
</body>
</html>