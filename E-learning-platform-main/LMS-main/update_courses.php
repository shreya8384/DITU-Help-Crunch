<?php

include ('connection.php');
if (count($_POST)>0) {
$sql="UPDATE courses set course='".$_POST['course']."' WHERE id='".$_POST['id']."'";
if (mysqli_query($conn, $sql)) {
header('location:manage_courses.php?updated');
}
else{
header('location:manage_courses.php?no_updated');
}
}
$recod= "SELECT * from courses WHERE id='".$_GET['id']."'";
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
  <!-- Latest compiled and minified CSS  "SELECT * FROM signup INNER JOIN finance_entry ON signup.cnic=finance_entry.cnic WHERE signup.cnic='$cnic'";      -->
  <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>
<body>

	
 <!----------------------------------- Modal for Update Courses --------------------------------------->
  
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

                  <form action="" method="POST">
                  <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                  <label for=""><b>New Course</b></label>
                  <span id="" class="require"></span><br>
                  <input type = "text" id  ="" name="course" placeholder = "Enter New Course" value="<?php echo $row['course']; ?>" required="value"><br><br>
                  <button type = "submit"id = "submits" name="submit"><b>Update Course</b></button>
                  </form>
                </div>
            </section>

          </div>
          <div class="modal-footer" style="background: #1f1f2e;">
            <a type="button" class="btn btn-secondary" href="manage_courses.php">Cancel</a>
          </div>
        </div>
        
      </div>
    </div>

</body>
</html>