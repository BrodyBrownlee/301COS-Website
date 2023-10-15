
<!DOCTYPE html>
<html lang="en">
<?php include "headsection.php"; ?>
<head>
    <title>
       Sign up
    </title>
</head>
<!-- form for signing up to the website -->
    <form class="booking" action="insert_account.php" method="post">
        <label for="name"><h2>Sign Up</h2></label>
        <label for="fname">First Name:</label>
        <input type="text" id="fname" name="fname"required><br> 
        <label for="lname">Last Name: </label>
        <input type="text" id="lname" name="lname"required><br><br>

        <label for="username">Username:</label>
        <input type="text" id="username" name="username" maxlength="13" required><br><br>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <label for="password">Confirm Password:</label>
        <input type="password" id="confirm_password" name="confirm_password" required><br><br>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <input type="submit" value="SUBMIT" name="signup">
    </form>
        <?php include "footsection.php"; ?>
    </body>
    <script src="function.js"></script>
</html>