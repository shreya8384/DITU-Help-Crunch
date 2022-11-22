<?php
session_start();
include ('connection.php');
if($_SESSION["sapid"]==true)
{
  $sapid = $_SESSION["sapid"];
  $result = mysqli_query($conn,"SELECT sapid, fname, image FROM `signup` WHERE sapid = '$sapid' ");
  $row= mysqli_fetch_array($result);

}
else
{
header("Location:http:user_dashboard.php");
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Student Management</title>
  <meta charset="utf-8">
  <!-- Required meta tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <style type="text/css">
        @media (min-width: 576px) {
            .h-sm-100 {
                height: 100%;
            }
        }
    </style>
</head>
<body>
<div class="container-fluid overflow-hidden">
    <div class="row vh-100 overflow-auto">
        <div class="col-12 col-sm-3 col-xl-2 px-sm-2 px-0 bg-dark d-flex sticky-top">
            <div class="d-flex flex-sm-column flex-row flex-grow-1 align-items-center align-items-sm-start px-3 pt-2 text-white">
                <a href="#" class="d-flex align-items-center pb-sm-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <span class="fs-5">STUDENT<span class="d-none d-sm-inline">Management</span></span>
                </a>
                <ul class="nav nav-pills flex-sm-column flex-row flex-nowrap flex-shrink-1 flex-sm-grow-0 flex-grow-1 mb-sm-auto mb-0 justify-content-center align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item">
                        <a href="#" class="nav-link px-sm-0 px-2">
                            <i class="fs-5 bi-house"></i><span class="ms-1 d-none d-sm-inline">Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-sm-0 px-2">
                            <i class="fs-5 bi-speedometer2"></i><span class="ms-1 d-none d-sm-inline">Dashboard</span> </a>
                    </li>
                    <li>
                        <a href="user_update.php?sapid=<?php echo $row['sapid']; ?>" class="nav-link px-sm-0 px-2">
                            <i class="fs-5 bi-table"></i><span class="ms-1 d-none d-sm-inline">Update Profile</span></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="nav-link dropdown-toggle px-sm-0 px-1" id="dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fs-5 bi-book-half"></i><span class="ms-1 d-none d-sm-inline">Courses</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdown">
                            <li><a class="dropdown-item" href="student_manage_course.php?sapid=<?php echo $row['sapid']; ?>">Add/Manage Courses</a></li>
                        </ul>
                        
                    </li>
                    <li class="dropdown">
                        <a href="#" class="nav-link dropdown-toggle px-sm-0 px-1" id="dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fs-5 bi-bootstrap"></i><span class="ms-1 d-none d-sm-inline">Finance</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdown">
                            <li><a class="dropdown-item" href="user_financial_status.php">Finanacial Status</a></li>
                        </ul>
                    </li>
                </ul>
                <div class="dropdown py-sm-4 mt-sm-auto ms-auto ms-sm-0 flex-shrink-1">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="profile_images/<?php echo $row['image']; ?>" alt="User" width="38" height="38" class="rounded-circle">
                        <span class="d-none d-sm-inline mx-1"><?php echo $row["sapid"];?></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                        <li><a class="dropdown-item" href="user_update.php?sapid=<?php echo $row['sapid']; ?>">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="" data-bs-toggle="modal" data-bs-target="#LogoutModal">Sign out</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col d-flex flex-column h-sm-100">
            <main class="row overflow-auto">
                <div class="col pt-4">
                    <!-- Breadcrumbs-->
                  <ol class="breadcrumb bg-light p-2">
                    <li class="breadcrumb-item">
                      <a href="admin_dashboard.php" class="text-decoration-none">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">Overview</li>
                  </ol>

                 <!-- Icon Cards-->
                  <div class="row">
                    <?php
                        include ('connection.php');

                        $sapid=$_SESSION['sapid'];
                       
                        $record="SELECT * FROM student_course WHERE sapid = '$sapid'";

                        $x= (mysqli_query($conn, $record));

                        while ($row= mysqli_fetch_array($x)) {
                      ?>
                    <div class="col-xl-3 col-sm-6 mb-3">
                      <div class="card text-white bg-warning o-hidden h-100">
                        <div class="card-body">
                          <div class="card-body-icon">
                            <i class="fs-5 bi-book"></i>
                          </div>
                          <div class="mr-5"></div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1 text-decoration-none" href="student_result_show.php?sapid=<?php echo $row['sapid']; ?>&course=<?php echo $row['course']; ?>">
                          <span class="float-left"><?php echo $row['course']; ?></span>
                          <span class="float-right">
                            <i class="fa fa-angle-right"></i>
                          </span>
                        </a>
                      </div>
                    </div>
                     <?php

                    }


                    ?>

                    
                </div>
            </main>
            <footer class="row bg-light py-2 mt-auto">
                <div class="copyright text-center my-auto">
                  <span>Copyright © 2022 Shreya_Verma</span>
                </div>
            </footer>
        </div>
    </div>
</div>
<!-- Logout Modal-->

    <div class="modal fade" id="LogoutModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Select "Logout" below if you are ready to end your current session.
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <a href="logout.php" class="btn btn-primary">Logout</a>
          </div>
        </div>
      </div>
    </div>

</body>
</html>
