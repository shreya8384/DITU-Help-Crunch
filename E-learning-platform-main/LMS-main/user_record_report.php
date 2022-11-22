<?php
session_start();
include('connection.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Users Data Record</title>

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
              <h4>Users Record Data</h4><br>
              <!-- Search -->
              <form  action="" method="POST">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Eenter sapid for Search. . . ." name="input1">
                  <div class="input-group-append">
                      <input type="submit" name="search" value="Search" class="btn btn-primary">
                  </div>
                </div>
              </form>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>SapId</th>
                      <th>Image</th>
                      <th>FirstName</th>
                      <th>LastName</th>
                      <th>Email</th>
                      <th>Password</th>
                      <th>Contact</th>
                      <th>Birth</th>
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
                      <th>SapId</th>
                      <th>Image</th>
                      <th>FirstName</th>
                      <th>LastName</th>
                      <th>Email</th>
                      <th>Password</th>
                      <th>Contact</th>
                      <th>Birth</th>
                      <th>Username</th>
                      <th>Class</th>
                      <th>Total Amount</th>
                      <th>Pay Amount</th>
                      <th>Remaining</th>
                      <th>Date</th>
                      
                    </tr>
                  </tfoot>
                  <?php
                    
                    $searchkey = 0;

                    if (isset($_POST['search'])) {

                      $searchkey = $_POST['input1'];

                      $record="SELECT * FROM signup INNER JOIN finance_entry ON signup.sapid=finance_entry.sapid WHERE signup.sapid LIKE '%$searchkey%'";
                    }
                    else{
                    $record="SELECT * FROM signup INNER JOIN finance_entry ON signup.sapid=finance_entry.sapid";
                    $searchkey = "";
                    
                    }
                    $x= (mysqli_query($conn, $record));

                    while ($row= mysqli_fetch_array($x)) {
                      ?>
                  <tbody>
                    <tr>
                      <td><?php echo $row['sapid']; ?></td>
                        <td><img src="profile_images/<?php echo $row['image']; ?>" style="width: 50px; height: 50px;"></td>
                        <td><?php echo $row['fname']; ?></td>
                        <td><?php echo $row['lname']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['password']; ?></td>
                        <td><?php echo $row['contact']; ?></td>
                        <td><?php echo $row['dob']; ?></td>

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
              <div class="text-right">
              <a href="generate_report.php?sapid=<?php echo $searchkey; ?>" class="btn btn-success btn-ln text-light align-right">Report</a>
              </div>
            </div>
            <div class="card-footer small text-muted"></div>
          </div>

</body>
</html>