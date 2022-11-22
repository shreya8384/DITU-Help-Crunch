<?php
session_start();
include ('connection.php');
if (count($_POST)>0) {

    $sql="UPDATE faculty set name='".$_POST['name']."', designation='".$_POST['designation']."', password='".$_POST['password']."' WHERE f_id='".$_POST['f_id']."'";
      if (mysqli_query($conn, $sql)) {
      header('location:faculty_dashboard.php');
      }
      else{
      header('location:faculty_dashboard.php');
      }

}
$recod= "SELECT * from faculty WHERE f_id='".$_GET['f_id']."'";
$x=(mysqli_query($conn, $recod));
$row=mysqli_fetch_array($x);

?>

<!DOCTYPE html>
<html>
<head>
<title>Student Management</title>
<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">

  	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="icon" type="image/jpg" href="images/icon.jpg">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Latest compiled and minified CSS  "SELECT * FROM signup INNER JOIN finance_entry ON signup.f_id=finance_entry.f_id WHERE signup.f_id='$f_id'";      -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

	<section class="form-register">
	 <div class="container">
	 	<h2>Update Profile</h2>
		<form action="" method="POST" class="form" enctype="multipart/form-data" onsubmit="return validation()">
              <div class="row">
                <div class="col-sm-6">

                  <label for="f_id">Faculty ID</label>
                  <span id="f_id" class="required"></span><br>
                  <input type="text" id="f_id" name ="f_id" placeholder="enter f_id" value="<?php echo $row["f_id"];?>" readonly><br><br>

                  <label for="name">Name</label>
                  <span id="Name" class="required"></span><br>
                  <input type="text" id="name" name ="name" placeholder="enter name" value="<?php echo $row["name"];?>"><br><br>

                  
                </div>
                <div class="col-sm-6">
                  <label for="designation">Designation</label>
                  <span id="designation" class="required"></span><br>
                  <input type = "designation" id="designation" name="designation" placeholder = "enter designation" value="<?php echo $row["designation"];?>"><br><br>

                  <label for="password">Password</label>
                  <span id="Password" class="required"></span><br>
                  <input type="password" id="password" name ="password" placeholder="enter password" value="<?php echo $row["password"];?>"><br><br>


                  <input type="submit" name="submit" value="Update">

                </div>
              </div>
            </form>
            </div>
        </section>


</body>
</html>