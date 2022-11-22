<?php
session_start();
include ('connection.php');

if(isset($_POST['submit']))
{

$sapid=$_POST['sapid'];
$assessment=$_POST['assessment'];
$course=$_POST['course'];
$totalmarks=$_POST['totalmarks'];
$gainmarks=$_POST['gainmarks'];
$percentage=$_POST['percentage'];



$user="SELECT * FROM student_result WHERE sapid='$sapid' AND assessment='$assessment' AND course='$course'";
$query = mysqli_query($conn, $user);

  if(mysqli_num_rows($query) > 0 ) { //check if there is already an entry for that username
    //echo "Username already exists!";

    //echo "chutti";
    //header('location:admin_dashboard.php?exists');
    echo '<script>alert("This Assignment Marks Already Exist.")</script>';
  
  }
  else{

    $sql="INSERT INTO student_result (`sapid`, `assessment`, `course`, `totalmarks`, `gainmarks`, `percentage`) VALUES ('$sapid', '$assessment', '$course', '$totalmarks', '$gainmarks', '$percentage')";

    if(mysqli_query($conn, $sql)) {
      
      
     // header('location:admin_dashboard.php?register');
     // echo "data insert";
      echo '<script>alert("Marks Inserted Successfully")</script>';
    }
    else{

      //echo "Error";
      //header('location:admin_dashboard.php?No_register');
      echo '<script>alert("Marks not Inserted Please try Again.")</script>';
    }
  }
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add/Manage Faculty</title>

	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">

  	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="icon" type="image/jpg" href="images/icon.jpg">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Latest compiled and minified CSS  "SELECT * FROM signup INNER JOIN finance_entry ON signup.cnic=finance_entry.cnic WHERE signup.cnic='$cnic'";      -->
  <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
    //this calculates values automatically
    percentage();
    $("#num1, #num2").on("keydown keyup", function() {
        percentage();
    });
});

function percentage() {

            var num1 = document.getElementById('num1').value;
            var num2 = document.getElementById('num2').value;
               var result = parseFloat(num2) / parseFloat(num1) *100;
              if (!isNaN(result) && result >= 0) {
                  document.getElementById('percent').value = result;
              }
            }

    </script>
</head>
<body>

	<div class="card mb-3">
            <div class="card-header">
              Add/Manage Faculty
            </div>
            <div class="card-body">
              <a class="btn btn-primary mb-3" href="" data-bs-toggle="modal" data-bs-target="#Add_Faculty_Modal">Add Result</a>
              <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Sap Id</th>                      
                      <th>Assessment</th>
                      <th>Course</th>
                      <th>Total Marks</th>
                      <th>Gain Marks</th>
                      <th>Percentage</th>
                      <th>Delete</th>
                      <th>Update</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Sap Id</th>                      
                      <th>Assessment</th>
                      <th>Course</th>
                      <th>Total Marks</th>
                      <th>Gain Marks</th>
                      <th>Percentage</th>
                      <th>Delete</th>
                      <th>Update</th>
                    </tr>
                  </tfoot>
                  <?php
                  
                    include ('connection.php');

                   
                    $record="SELECT * FROM student_result WHERE course='".$_GET['course']."'";
                   // $record="SELECT * FROM student_result INNER JOIN student_course ON student_result.sapid=student_course.sapid WHERE student_course.course = '" .$_GET['course']. "' ";

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
                      <td><a href="delete_student_result.php?sapid=<?php echo $row['sapid']; ?>&assessment=<?php echo $row['assessment']; ?>" class="btn btn-danger btn-sm text-light">Delete</a></td>
                      <td><a href="student_update_result.php?sapid=<?php echo $row['sapid']; ?>&assessment=<?php echo $row['assessment']; ?>&course=<?php echo $row['course']; ?>" class="btn btn-primary btn-sm text-light">Update</a></td>

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


  <!----------------------------------- Modal for Member Add Result --------------------------------------->
  
    <!-- Modal -->
    <div class="modal fade" id="Add_Faculty_Modal" role="dialog">
      <div class="modal-dialog">
      
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header" style="background: #1f1f2e; height: 100px;">

            <h2 class="">Add Members</h2>
            
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <h4 class="modal-title"></h4>
          </div>
          <div class="modal-body" style="background-image: linear-gradient(#c63939, #024759);">
            
            <section class="logsection">
               <div class="logform">

                  

                  <form action="" method="POST">

                  <label for=""><b>SapId</b></label><br>
                  <?php
                    $sql = "SELECT sapid FROM student_course WHERE course = '" .$_GET['course']. "'";
                    $result = $conn->query($sql);
                        echo "<select name='sapid' class='form-select w-75' aria-label='Default select example'>";
                        while ($row = $result->fetch_assoc()) {
                            unset($sapid);
                            $sapid = $row['sapid'];
                            echo '<option value="'.$sapid.'"  >'.$sapid.'</option>';
                        }
                        echo "</select><br>";
                    ?>
                  <label for=""><b>Assessment</b></label>
                 <?php
                    $sql = "SELECT DISTINCT assessment FROM course_assessment";
                    $result = $conn->query($sql);
                        echo "<select name='assessment' class='form-select w-75' aria-label='Default select example'>";
                        while ($row = $result->fetch_assoc()) {
                            unset($assessment);
                            $assessment = $row['assessment'];
                            echo '<option value="'.$assessment.'"  >'.$assessment.'</option>';
                        }
                        echo "</select><br>";
                    ?>
                  <label for=""><b>Course Name</b></label>
                  <span id="" class="require"></span><br>
                  <input type="text" id ="" name="course" readonly required="value" value="<?php echo $_GET['course']; ?>"><br><br>
                  <label for=""><b>Total Marks</b></label>
                  <span id="" class="require"></span><br>
                  <input type = "text" id="num1" name="totalmarks" placeholder = "Enter Total Marks" required="value"><br><br>
                  <label for=""><b>Gained Marks</b></label>
                  <span id="" class="require"></span><br>
                  <input type = "text" id="num2" name="gainmarks" placeholder = "Enter Gained Marks" required="value"><br><br>
                  <label for=""><b>Percentage</b></label>
                  <span id="" class="require"></span><br>
                  <input type = "text" id="percent" name="percentage" placeholder = "Enter Percentage" required="value"><br><br>
                  <button type = "submit" id="submits" name="submit"><b>Add Result</b></button>
                  </form>
                </div>
            </section>

          </div>
          <div class="modal-footer" style="background: #1f1f2e;">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          </div>
        </div>
        
      </div>
    </div>

    <?php 
                              
                       if(isset($_GET['updated']))
                       {
                                 
                           echo '<script>alert("Updated Data Successfully")</script>';
                       }

                        if(isset($_GET['no_updated']))
                        {
                                    
                            echo '<script>alert("Not Updated please try Again")</script>';
                        }


                         if(isset($_GET['exist']))
                       {
                                 
                           echo '<script>alert("This course  already enrolled.")</script>';
                       }

                        if(isset($_GET['enroll']))
                        {
                                    
                            echo '<script>alert("Course Enrolled Successfully")</script>';
                        }

                        if(isset($_GET['no_enroll']))
                        {
                                    
                            echo '<script>alert("Course not enrolled please try Again.")</script>';
                        }

                        

                  ?>


</body>
</html>