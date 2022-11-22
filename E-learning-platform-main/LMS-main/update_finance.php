<?php

include ('connection.php');
if (count($_POST)>0) {
$sql="UPDATE finance_entry set username='".$_POST['username']."', class='".$_POST['class']."',
totalamount='".$_POST['totalamount']."', amountpay='".$_POST['amountpay']."', remaining='".$_POST['remaining']."', date='".$_POST['date']."' WHERE id='".$_POST['id']."'";
if (mysqli_query($conn, $sql)) {
header('location:finance_table.php');
}
else{
header('location:finance_table.php');
}
}
$recod= "SELECT * from finance_entry WHERE id='".$_GET['id']."'";
$x=(mysqli_query($conn, $recod));
$row=mysqli_fetch_array($x);

?>

<!DOCTYPE html>
<html>
<head>
<title>DATA UPDATE</title>
<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">

  	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="icon" type="image/jpg" href="images/icon.jpg">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Latest compiled and minified CSS  "SELECT * FROM signup INNER JOIN finance_entry ON signup.sapid=finance_entry.sapid WHERE signup.sapid='$sapid'";      -->
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
	 	<h2>Update Finance</h2>
		<form action="" method="POST" class="form" enctype="multipart/form-data">
              <div class="row">
                <div class="col-sm-6">
                	<input type="hidden" name="id" value="<?php echo $row['id']; ?>">

                  <label for="username">UserName</label>
                  <span id="username" class="required"></span><br>
                  <input type="text" id="username" name ="username" placeholder="enter Username" value="<?php echo $row['username']; ?>"><br><br>
                  
                  <label for="sapid">SapId</label>
                  <span id="username" class="required"></span><br>
                  <input type="text" id="sapid" name ="sapid" placeholder="enter sapid" value="<?php echo $row['sapid']; ?>"><br><br>

                  <label for="class">Class</label>
                  <span id="username" class="required"></span><br>
                  <input type="text" id="class" name ="class" placeholder="enter Total Amount" value="<?php echo $row['class']; ?>"><br><br>

                  <label for="totalamount">Total Amount</label>
                  <span id="username" class="required"></span><br>
                  <input type="text" id="totalamount" name ="totalamount" placeholder="enter Total Amount" value="<?php echo $row['totalamount']; ?>"><br><br>
                  
                  
                </div>
                <div class="col-sm-6">

                  <label for="amountpay">Amount Pay</label>
                 <span id="username" class="required"></span><br>
                  <input type="text" id="amountpay" name ="amountpay" placeholder="enter Amount Pay" value="<?php echo $row['amountpay']; ?>"><br><br>

                  <label for="remainingamount">Remaining Amount</label>
                  <span id="username" class="required"></span><br>
                  <input type="text" id="remainingamount" name ="remaining" placeholder="Remaining Amount" value="<?php echo $row['remaining']; ?>"><br><br>

                  <label for="date">Date</label>
                  <span id="username" class="required"></span><br>
                  <input type = "date" id="date"  name="date" placeholder = "enter Date" value="<?php echo $row['date']; ?>"><br><br>

                  <input type="submit" name="submit" value="Submit">

                </div>
              </div>
            </form>
            </div>
        </section>


</body>
</html>