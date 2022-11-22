<?php

include ('connection.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Member Course enroll</title>
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
	<!----------------------------------- Modal for Admin Add Courses --------------------------------------->
  
    <!-- Modal -->
    <div class="" id="Add_Course_Modal" role="">
      <div class="modal-dialog">
      
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header" style="background: #1f1f2e; height: 100px;">

            <h2 class="">Add Courses</h2>
            
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <h4 class="modal-title"></h4>
          </div>
          <div class="modal-body" style="background-image: linear-gradient(#c63939, #024759);">
            
            <section class="logsection">
               <div class="logform">

                  <form action="insert_faculty_course.php" method="POST">

                  <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                  
                  <?php
					$sql = "SELECT DISTINCT course FROM courses";
					$result = $conn->query($sql);
					    echo "<select name='course' class='form-select w-75' aria-label='Default select example'>";
					    while ($row = $result->fetch_assoc()) {
					        unset($course);
					        $course = $row['course'];
					        echo '<option value="'.$course.'"  >'.$course.'</option>';
					    }
					    echo "</select>";
					?>
                  <button type = "submit"id = "submits" name="submit"><b>Add Course</b></button>
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

</body>
</html>