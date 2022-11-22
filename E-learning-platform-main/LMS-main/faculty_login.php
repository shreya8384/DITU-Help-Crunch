<?php
session_start();
include ('connection.php');

if (isset($_POST['submit'])) {

	$f_id=$_POST['f_id'];
	$password=$_POST['password'];

	if(empty($username) || empty($password))
{
    header('location:main.php?blank');
    
}

else{
	$sql="SELECT * from faculty WHERE f_id='$f_id' && password='$password'";

	$result=(mysqli_query($conn, $sql));
	if ($result->num_rows>0) {


		$_SESSION["f_id"]=$f_id;
		header('Location:faculty_dashboard.php');
		
		
		
	}
	
	else{
		//echo "Email and Password are incorrect";
		header('location:main.php?incorrect');
		
	}

	}

}
?>