<?php
  session_start();
  include ('connection.php');
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
</head>
<body>

	<div class="card mb-3">
            <div class="card-header">
              Add/Manage Faculty
            </div>
            <div class="card-body">
              <a class="btn btn-primary mb-3" href="" data-bs-toggle="modal" data-bs-target="#Add_Faculty_Modal">Add Members</a>
              <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Member Id</th>                      
                      <th>Name</th>
                      <th>Designation</th>
                      <th>Course Enrolled</th>
                      <th>Delete</th>
                      <th>Update</th>
                      <th>Course Enroll/Delete</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Member Id</th>                      
                      <th>Name</th>
                      <th>Designation</th>
                      <th>Course Enrolled</th>
                      <th>Delete</th>
                      <th>Update</th>
                      <th>Course Enroll/Delete</th>
                    </tr>
                  </tfoot>
                  <?php
                    include ('connection.php');

                   
                    //$record="SELECT * FROM faculty";
                    $record="SELECT * FROM faculty LEFT JOIN faculty_course ON faculty.f_id=faculty_course.id";

                    $x= (mysqli_query($conn, $record));

                    while ($row= mysqli_fetch_array($x)) {
                      ?>
                  <tbody>
                    <tr>
                      <td><?php echo $row['f_id']; ?></td>
                      <td><?php echo $row['name']; ?></td>
                      <td><?php echo $row['designation']; ?></td>
                      <td><?php echo $row['course']; ?></td>
 
                        <td><a href="delete_faculty.php?f_id=<?php echo $row['f_id']; ?>" class="btn btn-danger btn-sm text-light">Delete</a></td>
                        <td><a href="update_faculty.php?f_id=<?php echo $row['f_id']; ?>" class="btn btn-primary btn-sm text-light">Update</a></td>
                        <td><a href="faculty_course_enroll.php?id=<?php echo $row['f_id']; ?>" class="btn btn-primary btn-sm text-light">Course Enroll</a>
                          <a href="delete_faculty_course.php?f_id=<?php echo $row['f_id']; ?>&course=<?php echo $row['course']; ?>" class="btn btn-danger btn-sm text-light">Course Delete</a></td>

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


  <!----------------------------------- Modal for Admin Add Courses --------------------------------------->
  
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

                  <?php 
                              
                       if(isset($_GET['exists']))
                       {
                                 
                           echo '<script>alert("This member name already exists.")</script>';
                       }

                        if(isset($_GET['inserted']))
                        {
                                    
                            echo '<script>alert("Member Added Successfully")</script>';
                        }

                        if(isset($_GET['No_inserted']))
                        {
                                    
                            echo '<script>alert("Member not added please try Again.")</script>';
                        }

                  ?>

                  <form action="insert_faculty.php" method="POST">

                  <label for=""><b>Member Id</b></label>
                  <span id="" class="require"></span><br>
                  <input type = "text" id  ="" name="f_id" placeholder = "Enter Id" required="value"><br><br>
                  <label for=""><b>Name</b></label>
                  <span id="" class="require"></span><br>
                  <input type = "text" id  ="" name="name" placeholder = "Enter Name" required="value"><br><br>
                  <label for=""><b>Designation</b></label>
                  <span id="" class="require"></span><br>
                  <input type = "text" id  ="" name="designation" placeholder = "Enter Designation" required="value"><br><br>
                  <label for=""><b>Password</b></label>
                  <span id="" class="require"></span><br>
                  <input type = "password" id  ="" name="password" placeholder = "Enter Password" required="value"><br><br>
                  <button type = "submit"id = "submits" name="submit"><b>Add Member</b></button>
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
                                 
                           echo '<script>alert("Updated Member Data Successfully")</script>';
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