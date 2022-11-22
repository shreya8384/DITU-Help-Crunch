<?php
include ('connection.php');

$sql="DELETE FROM signup WHERE sapid='" .$_GET['sapid']. "'";

if(mysqli_query($conn, $sql)){

	header('location:user_table.php');
	//echo "delete successfully";
}
else{


	header('location:user_table.php');
	//echo "error";
}

?>

