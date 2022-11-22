<?php

include ('connection.php');

if(isset($_POST['submit']))
{
$username=$_POST['username'];
$sapid=$_POST['sapid'];
$class=$_POST['class'];
$totalamount=$_POST['totalamount'];
$amountpay=$_POST['amountpay'];
$remainingamount=$_POST['remainingamount'];
$date=$_POST['date'];



$user="SELECT * FROM signup WHERE sapid='$sapid'";
$query = mysqli_query($conn, $user);

	if(mysqli_num_rows($query) > 0 ) { //check if there is already an entry for that username
		//echo "Username already exists!";

		$sql="INSERT INTO finance_entry (`username`, `sapid`, `class`, `totalamount`, `amountpay`, `remaining`, `date`) VALUES ('$username', '$sapid', '$class', '$totalamount', '$amountpay', '$remainingamount', '$date')";

		if(mysqli_query($conn, $sql)) {
			
			
			header('location:admin_dashboard.php?register');
			//echo "data insert";
		}
		else{

			//echo "Error";
			header('location:admin_dashboard.php?No_register');
		}
	
	}
	else{

		//echo "chutti";
		header('location:admin_dashboard.php?exists');
	}
}
?>