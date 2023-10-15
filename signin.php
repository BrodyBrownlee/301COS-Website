<!DOCTYPE html>
<html lang="en">
<?php include "headsection.php"; ?>
<head>
    <title>
       Sign in
    </title>
</head>
    <form class="booking" action="login.php" method="post">
    <div class="content-title">
        <label><h2>Sign in</h2></label>
    </div>
    <!-- form for signing in to an account using the username and password stored in the database -->
    <div class="content-text">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        
        <input type="submit" value="SUBMIT" name="signin">
        <br><br>
       <label id="signup"><p> Don't have an account? <a href="signup.php">Click here</p></a></label>
    </div> 
    
    </form>
        <?php include "footsection.php"; ?>
    </body>
    <script src="function.js"></script>
</html>