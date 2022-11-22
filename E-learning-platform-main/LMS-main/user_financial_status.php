<?php
session_start();
include('connection.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>User Record Report</title>

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

	<div class="card mb-3">
            <div class="card-header">
              <i class=""></i>
              <h4>User Financial Status</h4><br>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Sapid</th>
                      <th>Username</th>
                      <th>Class</th>
                      <th>Total Amount</th>
                      <th>Pay Amount</th>
                      <th>Remaining</th>
                      <th>Date</th>
                      
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Sapid</th>
                      <th>Username</th>
                      <th>Class</th>
                      <th>Total Amount</th>
                      <th>Pay Amount</th>
                      <th>Remaining</th>
                      <th>Date</th>
                      
                    </tr>
                  </tfoot>
                  <?php
                    include ('connection.php');

                    $sapid = $_SESSION["sapid"];

                    $record="SELECT * FROM finance_entry WHERE sapid = '$sapid' ";

                    $x= (mysqli_query($conn, $record));

                    while ($row= mysqli_fetch_array($x)) {
                      ?>
                  <tbody>
                    <tr>
                      <td><?php echo $row['sapid']; ?></td>

                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['class']; ?></td>
                        <td><?php echo $row['totalamount']; ?></td>
                        <td><?php echo $row['amountpay']; ?></td>
                        <td><?php echo $row['remaining']; ?></td>
                        <td><?php echo $row['date']; ?></td>
                      

                    </tr>
                  </tbody>
                  <?php

                    }


                    ?>
                </table>
              </div>
            </div>
            <div class="card-footer small text-muted"></div>
          </div>


</body>
</html>