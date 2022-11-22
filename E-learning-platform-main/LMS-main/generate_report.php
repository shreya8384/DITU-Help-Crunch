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

  <style type="text/css">
    @page{
      size: A4;
      margin: 0;
    }

    @media print{
      .btn{

      display: none;
      visibility: none;
    }
    }
  </style>
</head>
<body>
  <?php
        $sapid = $_GET['sapid'];

        if ($sapid == "") {

          header('location:user_record_report.php');
        }
        else{       
        $record="SELECT signup.image, signup.sapid, signup.fname, signup.lname, signup.email, signup.password, signup.contact, signup.dob, finance_entry.username, finance_entry.class, finance_entry.totalamount, finance_entry.amountpay, finance_entry.remaining, finance_entry.date FROM signup INNER JOIN finance_entry ON signup.sapid=finance_entry.sapid WHERE signup.sapid LIKE '%$sapid%'";
        $x= (mysqli_query($conn, $record));

            $row= mysqli_fetch_array($x);
            }
                      ?>
<div class="container pt-5">
  <h3 class="text-center">Financial Report</h3>
	<div class="card mb-3">
              <div class="card-body">
                <div class="row">
                <div class="col">
                  <img src="profile_images/<?php echo $row['image']; ?>" style="width: 90px; height: 90px;">
                  <p><b>Name:</b> <?php echo $row['fname']; ?> <?php echo $row['lname']; ?></p>
                  <p><b>Sapid:</b> <?php echo $row['sapid']; ?></p>
                  <p><b>Birth Date:</b> <?php echo $row['dob']; ?></p>

                </div>
                <div class="col text-right">
                  <p><b>Username:</b> <?php echo $row['username']; ?></p>
                  <p><b>Class:</b> <?php echo $row['class']; ?></p>
                  <p><b>Email:</b> <?php echo $row['email']; ?></p>
                  <p><b>Contact:</b> <?php echo $row['contact']; ?></p>
                </div>
              </div>
              <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>sapid</th>
                      <th>Total Amount</th>
                      <th>Pay Amount</th>
                      <th>Remaining</th>
                      <th>Date</th>
                      
                    </tr>
                  </thead>
                  <?php

                    $total = 0;
                    $paid = 0;
                    $remainingtotal = 0;
                    
                    $x= (mysqli_query($conn, $record));

                    while ($row= mysqli_fetch_array($x)) {
                      ?>
                  <tbody>
                    <tr>
                      <td><?php echo $row['sapid']; ?></td>
                        <td><?php echo $row['totalamount']; ?></td>
                        <td><?php echo $row['amountpay']; ?></td>
                        <td><?php echo $row['remaining']; ?></td>
                        <td><?php echo $row['date']; ?></td>
                      

                    </tr>
      
                  </tbody>
                  <?php

                  $total += $row['totalamount'];
                  $paid += $row['amountpay'];
                  $remainingtotal += $row['remaining'];

                    }



                    ?>
                    <tr>
                      <th></th>
                      <th></th>
                      <th>Total</th>
                      <th>Total Paid</th>
                      <th>Total Remainig</th>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                      <td><?php echo $total; ?> </td>
                      <td><?php echo $paid; ?> </td>
                      <td><?php echo $remainingtotal; ?> </td>
                    </tr>
                </table>
                <button onclick="window.print()" class="btn btn-primary">Print Report</button>
              </div>
            </div>
          </div>
        </div>

</body>
</html>