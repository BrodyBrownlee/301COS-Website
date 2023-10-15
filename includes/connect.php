<?php
// connect to database

try
{
    $pdo = new PDO('mysql:host=localhost;dbname=brodybrownlee_calendar','brodybrownlee','sB2y8HXhURTM41');
}
catch(PDOException $e)
{
    echo'Unable to connect to the database server.';
    exit;
}
?>