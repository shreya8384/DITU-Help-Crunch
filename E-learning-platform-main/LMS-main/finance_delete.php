<?php
include ('connection.php');

$sql="DELETE FROM finance_entry WHERE id='" .$_GET['id']. "'";

if(mysqli_query($conn, $sql)){

	header('location:finance_table.php');
	//echo "delete successfully";
}
else{


	header('location:finance_table.php');
	//echo "error";
}

?>

