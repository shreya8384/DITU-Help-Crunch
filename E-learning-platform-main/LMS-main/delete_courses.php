<?php
include ('connection.php');

$sql="DELETE FROM courses WHERE id='" .$_GET['id']. "'";

if(mysqli_query($conn, $sql)){

	header('location:manage_courses.php');
	//echo "delete successfully";
}
else{


	header('location:manage_courses.php');
	//echo "error";
}

?>

