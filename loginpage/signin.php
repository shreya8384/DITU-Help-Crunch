<?php

$servername ="127.0.0.1:3307";
$username = "root";
$password = "root";
$dbname = "login";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
	die("connection failed");
}

$email = $_POST['email'];
$password = $_POST['password'];
$salt = "ditu-help-crunch";
$password_encrypted = sha1($password.$salt);


$sql = mysqli_query($conn, "SELECT count(*) as total from signup WHERE email = '".$email."' and 
	password = '".$password_encrypted."'");

$row = mysqli_fetch_array($sql);

if($row["total"] > 0){
	?>

	 
	<script>
			window.location.href="../index.html";
		//window.location.href = "C:\xampp\htdocs\DITU-HELP-CRUNCH\index.html";
	</script>
	
	<?php
}
else{
	?>
	<script>
		alert('Login failed');
	</script>
	<?php
}

?>