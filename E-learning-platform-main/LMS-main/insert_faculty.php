<?php

include ('connection.php');

if(isset($_POST['submit']))
{
$f_id=$_POST['f_id'];
$name=$_POST['name'];
$designation=$_POST['designation'];
$password=$_POST['password'];


$user="SELECT * FROM faculty WHERE f_id='$f_id'";
$query = mysqli_query($conn, $user);

	if(mysqli_num_rows($query) > 0 ) { //check if there is already an entry for that username
		//echo "Username already exists!";

		header('location:manage_faculty.php?exists');
	}
	else{

		//echo "chutti";
		$sql="INSERT INTO faculty(`f_id`, `name`, `designation`, `password`) VALUES ('$f_id', '$name', '$designation', '$password')";

		if(mysqli_query($conn, $sql)) {
			
			
			header('location:manage_faculty.php?inserted');
			//echo "data not insert";
		}
		else{

			//echo "Error";
			header('location:manage_faculty.php?No_inserted');
		}

	}
}
?>