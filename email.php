<?
session_start();

//connect ot database
include 'includes/connect.php'
?>
<div class="enteremail">
    <!-- form for submitting your email to the emailList -->
            <h2>SUBSCRIBE</h2>
                <p>Enter your email for the latest information and updates</p>
                <form class="form" method="post" action="send-email.php">
                    <input class="inputemail" type="email" name="email" placeholder="Email Address" value="" required> 
                    <input class="inputemail-button" type="submit" name="email-button" value="Submit">
                </form>
            </div>