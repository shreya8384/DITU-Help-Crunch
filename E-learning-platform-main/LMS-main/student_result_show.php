<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Student Management</title>
  <!-- Required meta tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="style.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
   <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              User Data</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Sapid</th>
                      <th>Assessment</th>
                      <th>Course</th>
                      <th>Total Marks</th>
                      <th>Gain Marks</th>
                      <th>Percentage</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Sapid</th>
                      <th>Assessment</th>
                      <th>Course</th>
                      <th>Total Marks</th>
                      <th>Gain Marks</th>
                      <th>Percentage</th>
                    </tr>
                  </tfoot>
                  <?php
                    include ('connection.php');

                    $record="SELECT * FROM student_result WHERE sapid='".$_GET['sapid']."' AND course='".$_GET['course']."'";
                    $x= (mysqli_query($conn, $record));

                    while ($row= mysqli_fetch_array($x)) {
                      ?>
                  <tbody>
                    <tr>
                      <td><?php echo $row['sapid']; ?></td>
                        <td><?php echo $row['assessment']; ?></td>
                        <td><?php echo $row['course']; ?></td>
                        <td><?php echo $row['totalmarks']; ?></td>
                        <td><?php echo $row['gainmarks']; ?></td>
                        <td><?php echo $row['percentage']; ?></td>
                        

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

        </div>

</body>
</html>