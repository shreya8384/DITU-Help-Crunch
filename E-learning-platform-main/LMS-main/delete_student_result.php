<?php
include ('connection.php');

$sql="DELETE FROM student_result WHERE sapid='" .$_GET['sapid']. "'AND assessment='" .$_GET['assessment']. "'";

if(mysqli_query($conn, $sql)){

	header('location:manage_result.php');
	//echo "delete successfully";
}
else{


	header('location:manage_result.php');
	//echo "error";
}

?>

