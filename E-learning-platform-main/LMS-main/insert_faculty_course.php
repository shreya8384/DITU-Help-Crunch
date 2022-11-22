<?php

include ('connection.php');

if(isset($_POST['submit']))
{
$id=$_POST['id'];
$course=$_POST['course'];


$sql="SELECT * FROM faculty_course WHERE id='$id' AND course='$course'";
$query = mysqli_query($conn, $sql);

	if(mysqli_num_rows($query) > 0 ) { //check if there is already an entry for that username
		//echo "Username already exists!";
		header('location:manage_faculty.php?exist');
	}
	else{

		$sql="INSERT INTO faculty_course(`id`, `course`) VALUES ('$id', '$course')";

		if(mysqli_query($conn, $sql)) {
			
			//echo "success";
			header('location:manage_faculty.php?enroll');
		}
		else{

			//echo "Error";
			header('location:manage_faculty.php?no_enroll');
		}

	}
}
?>