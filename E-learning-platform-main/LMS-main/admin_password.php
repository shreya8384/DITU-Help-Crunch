<?php
session_start();
include ('connection.php');

if (isset($_POST['submit'])) {
	$username=$_POST['username'];
	$oldpass=$_POST['oldpass'];
	$newpass=$_POST['newpass'];

	if(empty($oldpass) || empty($newpass))
{
    header('location:main.php?empty');
    
}

else{
	$sql="SELECT password from admin WHERE username='$username' && password='$oldpass'";

	$result=(mysqli_query($conn, $sql));
	if ($result->num_rows>0) {

		$update="UPDATE admin set password='$newpass' where username = '$username' ";
		if (mysqli_query($conn, $update)) {
		 	# code...
		 	header("Location:http:admin_dashboard.php?updated");
		 }
		 else{

		 	header("Location:http:admin_dashboard.php?errorupdate");
		 }

		
		
	}
	
	else{
		//echo "Email and Password are incorrect";
		header('location:main.php?notcorrect');
		
	}

	}

}
?>