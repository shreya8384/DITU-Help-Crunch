<?php
$servername = "127.0.0.1:3308";
$username = "root";
$password = "root";
session_start();
// Create connection
$db = new mysqli($servername, $username, $password,'newsp');
?>