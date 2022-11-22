<?php
include ('connection.php');

$sql="DELETE FROM faculty_course WHERE id='" .$_GET['f_id']. "' AND course='".$_GET['course']."' ";

//$sql="DELETE faculty FROM faculty INNER JOIN faculty_course ON faculty_course.id = faculty.f_id WHERE faculty.f_id='" .$_GET['f_id']. "'";

if(mysqli_query($conn, $sql)){

	header('location:manage_faculty.php');
	//echo "delete successfully";
}
else{


	header('location:manage_faculty.php');
	//echo "error";
}

?>

