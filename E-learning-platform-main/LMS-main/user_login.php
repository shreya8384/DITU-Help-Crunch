<?php
session_start();
include ('connection.php');

if (isset($_POST['submit'])) {

	$sapid=$_POST['sapid'];
	$password=$_POST['password'];

	if(empty($username) || empty($password))
{
    header('location:main.php?blank');
    
}

else{
	$sql="SELECT * from signup WHERE sapid='$sapid' && password='$password'";

	$result=(mysqli_query($conn, $sql));
	if ($result->num_rows>0) {


		$_SESSION["sapid"]=$sapid;
		header("Location:user_dashboard.php");
		
		
		
	}
	
	else{
		//echo "Email and Password are incorrect";
		header('location:main.php?incorrect');
		
	}

	}

}
?>