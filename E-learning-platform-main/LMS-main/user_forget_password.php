<?php
session_start();
include ('connection.php');

if (isset($_POST['submit'])) {

	$sapid=$_POST['sapid'];

	$email=$_POST['email'];

	if(empty($email)||empty($email))
	{
	    header('location:main.php?blank');
	    
	}

else{
	$sql="SELECT email, password from signup WHERE sapid='$sapid' && email='$email'";

	$result=(mysqli_query($conn, $sql));
	if ($result->num_rows>0) {


		$x=(mysqli_query($conn, $sql));
		$row=mysqli_fetch_array($x);

		$to_email = $row['email'];
		$subject = "Password Recovery";
		$body = "Password: ".$row['password'];
		$headers = "From: mmuhammadhamid514@gmail.com";

		mail($to_email, $subject, $body, $headers);
		
		header('location:main.php?send');
		
		
	}
	
	else{
		//echo "Email and Password are incorrect";
		header('location:main.php?notsend');
		
	}

	}

}
?>