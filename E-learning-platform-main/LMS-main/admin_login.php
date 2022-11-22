<?php
session_start();
include ('connection.php');

if (isset($_POST['submit'])) {

	$username=$_POST['username'];
	$password=$_POST['password'];

	if(empty($username) || empty($password))
{
    header('location:main.php?empty');
    
}

else{
	$sql="SELECT * from admin WHERE username='$username' && password='$password'";

	$result=(mysqli_query($conn, $sql));
	if ($result->num_rows>0) {
		$_SESSION["username"]=$username;
		header("Location:admin_dashboard.php");
	}
	else{
		//echo "Email and Password are incorrect";
		header('location:main.php?notcorrect');
	}

	}

}
?>