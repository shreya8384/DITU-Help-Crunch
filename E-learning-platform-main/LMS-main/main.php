  <!DOCTYPE html>
<html>
<head>
	<title>Student Management</title>

	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">

  	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="icon" type="image/jpg" href="images/icon.jpg">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body class="bg" >

	<div class="container mainbtn">
	<div class="row">
		<div class="col-md-4 offset-md-4  from-div">
				<div class="form-group">
					<button  type="submit" class="btn btn-primary btn-block btn-lg" data-toggle="modal" data-target="#myModal">USER</button>
					<button  type="submit" class="btn btn-primary btn-block btn-lg" data-toggle="modal" data-target="#FacultyModal">FACULTY</button>
				<!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal1">
    Open modal
  </button> -->
					<button  type="submit" class="btn btn-primary btn-block btn-lg" data-toggle="modal" data-target="#AdminModal">ADMIN</button>
				</div>
		</div>	
	</div>
</div>
<!---------------------------------- Modal for Signup --------------------------------------------------->
	<div class="container">
	  <!-- Modal -->
	  <div class="modal fade" id="MyModal" role="dialog">
	    <div class="modal-dialog modal-lg modal-dialog-scrollable">
	    
	      <!-- Modal content-->
	      <div class="modal-content">
	        <div class="modal-header" style="background: #1f1f2e; height: 100px;">
	          
	            <h2 class="fa fa-sign-up"> SIGNUP</h2>
	          
	          <button type="button" class="close text-primary" data-dismiss="modal">&times;</button>
	          <h4 class="modal-title"></h4>
	        </div>
	        <div class="modal-body" style="background-image: linear-gradient(#c63939, #024759);">
	          
	          <section class="form-register">
			    <div class="container">
			    	<?php 
                            
                     if(isset($_GET['register']))
                     {
                               
                         echo '<script>alert("You are Signup Successfully")</script>';
                     }

                      if(isset($_GET['No_register']))
                      {
                                  
                          echo '<script>alert("No Signup Successfully")</script>';
                      }

                      if(isset($_GET['exists']))
                      {
                                  
                          echo '<script>alert("Username Already Exist")</script>';
                      }
                        
                	?>
			      <form action="user_signup.php" method="POST" class="form" enctype="multipart/form-data" onsubmit="return validation()">
				      <div class="row">
				        <div class="col-sm-6">
				          <label for="image">Image</label>
				          <span id="Image" class="required"></span><br>
				          <input type = "file" id="image" name="image"><br><br>

				          <label for="sapid">SapId</label>
				          <span id="sapid" class="required"></span><br>
				          <input type="text" id="sapid" name ="sapid" placeholder="enter sapid"><br><br>

				          <label for="fname">First Name</label>
				          <span id="FName" class="required"></span><br>
				          <input type="text" id="fname" name ="fname" placeholder="enter first name"><br><br>

				          <label for="lname">Last Name</label>
				          <span id="LName" class="required"></span><br>
				          <input type="text" id="lname" name ="lname" placeholder="enter last name"><br><br>

				          <label for="dob">Date of Birth</label>
				          <span id="Datebirth" class="required"></span><br>
				          <input type = "date" id="dob"  name="dob" placeholder = "enter date of birth" ><br><br>

				          
				        </div>
				        <div class="col-sm-6">
				        	<label for="email">Email</label>
				          <span id="Email" class="required"></span><br>
				          <input type = "email" id="email" name="email" placeholder = "enter email" ><br><br>

				          <label for="password">Password</label>
				          <span id="Password" class="required"></span><br>
				          <input type="password" id="password" name ="password" placeholder="enter password"><br><br>

				        	<label for="contact">Contact</label>
				          <span id="Contact" class="required"></span><br>
				          <input type = "text" id="contact" name="contact" placeholder = "enter contact" ><br><br>

				          <input type="hidden" name="username" readonly value="<?php echo $_SESSION["username"]; ?>">

				          <input type="submit" name="submit" value="Submit">

				        </div>
				      </div>
			      </form>
			    </div>
			</section>

	        </div>
	        <div class="modal-footer" style="background: #1f1f2e;">
	          <button type="button" class="btn btn-primary" data-dismiss="modal" data-toggle="modal" data-target="#myModal">Login</button>
	        </div>
	      </div>
	      
	    </div>
	  </div>
	</div>


	<!----------------------------------- Modal for login ----------------------------------------------->
	<div class="container">
	  <!-- Modal -->
	  <div class="modal fade" id="myModal" role="dialog">
	    <div class="modal-dialog">
	    
	      <!-- Modal content-->
	      <div class="modal-content">
	        <div class="modal-header" style="background: #1f1f2e; height: 100px;">
	          
	            <h2 class="fa fa-sign-in"> LOGIN</h2>
	          <button type="button" class="close text-primary" data-dismiss="modal">&times;</button>
	          <h4 class="modal-title"></h4>
	        </div>
	        <div class="modal-body" style="background-image: linear-gradient(#c63939, #024759);">
	          
	          <section class="logsection">
	             <div class="logform">
	               

	                <?php 
	                            
	                     if(isset($_GET['blank']))
	                     {
	                               
	                         echo '<script>alert("Please Enter Username and Password")</script>';
	                     }

	                      if(isset($_GET['incorrect']))
	                      {
	                                  
	                          echo '<script>alert("Your Account is Blocked or Incorrect")</script>';
	                      }
	                        
	                ?>


	                <form action="user_login.php" method="POST">

	                <label for="sapid"><b>SapId</b></label>
	                <span id="sapid" class="require"></span><br>
	                <input type = "text" id  ="sapid" name="sapid" placeholder = "Enter sapid" required="value"><br><br>
	                
	                <label for="password"><b>Password</b></label>
	                <span id="Passcode" class="require"></span><br>
	                <input type = "password" id  ="password" name="password" placeholder = "Enter password" required="value"><br><br>
	               <!--   <input type="submit" name="submit" value="submit"> -->
	                <button type = "submit"id = "submits" name="submit"><b>Login</b></button>
	                </form>
	                <a href="" data-toggle="modal" data-target="#MyModal" data-dismiss="modal">Create an Account</a><br>
	                <a href="" class="text-danger" data-toggle="modal" data-target="#forgetpasswordmodel" data-dismiss="modal">Forgot Password</a>
	              </div>
	          </section>

	        </div>
	        <div class="modal-footer" style="background: #1f1f2e;">
	          <button type="button" class="btn btn-primary" data-dismiss="modal" data-toggle="modal" data-target="#AdminModal">Admin</button>
	        </div>
	      </div>
	      
	    </div>
	  </div>
	</div>


	<!----------------------------------- Modal for Forget Password ----------------------------------------------->
	<div class="container">
	  <!-- Modal -->
	  <div class="modal fade" id="forgetpasswordmodel" role="dialog">
	    <div class="modal-dialog">
	    
	      <!-- Modal content-->
	      <div class="modal-content">
	        <div class="modal-header" style="background: #1f1f2e; height: 100px;">
	          
	            <h2 class="fa fa-sign-in"> Password Recovery</h2>
	          <button type="button" class="close text-primary" data-dismiss="modal">&times;</button>
	          <h4 class="modal-title"></h4>
	        </div>
	        <div class="modal-body" style="background-image: linear-gradient(#c63939, #024759);">
	          
	          <section class="logsection">
	             <div class="logform">
	               

	                <?php 
	                            
	                     if(isset($_GET['blank']))
	                     {
	                               
	                         echo '<script>alert("Please Enter Username and Password")</script>';
	                     }

	                      if(isset($_GET['incorrect']))
	                      {
	                                  
	                          echo '<script>alert("Your Account is Blocked or Incorrect")</script>';
	                      }
	                      if(isset($_GET['send']))
	                     {
	                               
	                         echo '<script>alert("Please Check! The Password Send to Your Email.")</script>';
	                     }

	                      if(isset($_GET['notsend']))
	                      {
	                                  
	                          echo '<script>alert("Your Email is Incorrect.")</script>';
	                      }
	                        
	                ?>


	                <form action="user_forget_password.php" method="POST">

	                <label for="sapid"><b>SapID</b></label>
	                <span id="sapid" class="require"></span><br>
	                <input type = "text" id  ="sapid" name="sapid" placeholder = "Enter Sapid" required="value"><br><br>
	                <label for="email"><b>Email</b></label>
	                <span id="email" class="require"></span><br>
	                <input type = "email" id  ="email" name="email" placeholder = "Enter Email" required="value"><br><br>
	                
	               <!--   <input type="submit" name="submit" value="submit"> -->
	                <button type = "submit"id = "submits" name="submit"><b>Submit</b></button>
	                </form>
	                
	              </div>
	          </section>

	        </div>
	        <div class="modal-footer" style="background: #1f1f2e;">
	          <button type="button" class="btn btn-primary" data-dismiss="modal" data-toggle="modal" data-target="#myModal">Login</button>
	        </div>
	      </div>
	      
	    </div>
	  </div>
	</div>


	<!----------------------------------- Modal for Admin login --------------------------------------->
	<div class="container">
	  <!-- Modal -->
	  <div class="modal fade" id="AdminModal" role="dialog">
	    <div class="modal-dialog">
	    
	      <!-- Modal content-->
	      <div class="modal-content">
	        <div class="modal-header" style="background: #1f1f2e; height: 100px;">

	        	<h2 class="fa fa-sign-in"> ADMIN LOGIN</h2>
	          
	          <button type="button" class="close text-primary" data-dismiss="modal">&times;</button>
	          <h4 class="modal-title"></h4>
	        </div>
	        <div class="modal-body" style="background-image: linear-gradient(#c63939, #024759);">
	          
	          <section class="logsection">
	             <div class="logform">

	                <form action="admin_login.php" method="POST">

	                <label for="username"><b>Username</b></label>
	                <span id="Username" class="require"></span><br>
	                <input type = "text" id  ="username" name="username" placeholder = "Enter username" required="value"><br><br>
	                
	                <label for="password"><b>Password</b></label>
	                <span id="Passcode" class="require"></span><br>
	                <input type = "password" id  ="password" name="password" placeholder = "Enter password" required="value"><br><br>
	                <button type = "submit"id = "submits" name="submit"><b>Login</b></button>
					
	                </form>
	              </div>
	          </section>

	        </div>
	        <div class="modal-footer" style="background: #1f1f2e;">
	          <button type="button" class="btn btn-primary" data-dismiss="modal" data-toggle="modal" data-target="#myModal">User</button>
	        </div>
	      </div>
	      
	    </div>
	  </div>
	</div> 
	<!-- The Modal -->
  <div class="modal" id="myModal1">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Modal Heading</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          Modal body..
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  
</div>

	<!----------------------------------- Modal for Faculty login --------------------------------------->
	<div class="container">
	  <!-- Modal -->
	  <div class="modal fade" id="FacultyModal" role="dialog">
	    <div class="modal-dialog">
	    
	      <!-- Modal content-->
	      <div class="modal-content">
	        <div class="modal-header" style="background: #1f1f2e; height: 100px;">

	        	<h2 class="fa fa-sign-in"> FACULTY LOGIN</h2>
	          
	          <button type="button" class="close text-primary" data-dismiss="modal">&times;</button>
	          <h4 class="modal-title"></h4>
	        </div>
	        <div class="modal-body" style="background-image: linear-gradient(#c63939, #024759);">
	          
	          <section class="logsection">
	             <div class="logform">

	                <form action="faculty_login.php" method="POST">

	                <label for="f_id"><b>Faculty ID</b></label>
	                <span id="f_id" class="require"></span><br>
	                <input type="text" id ="f_id" name="f_id" placeholder="Enter ID" required="value"><br><br>
	                
	                <label for="password"><b>Password</b></label>
	                <span id="Passcode" class="require"></span><br>
	                <input type="password" id="password" name="password" placeholder="Enter password" required="value"><br><br>
	                <button type = "submit" id="submits" name="submit"><b>Login</b></button>
	                </form>
	              </div>
	          </section>

	        </div>
	        <div class="modal-footer" style="background: #1f1f2e;">
	          <button type="button" class="btn btn-primary" data-dismiss="modal" data-toggle="modal" data-target="#myModal">User</button>
	        </div>
	      </div>
	      
	    </div>
	  </div>
	</div>

	<?php 
	                            
	  if(isset($_GET['empty']))
	  {
	            
	      echo '<script>alert("Please Enter Username and Password")</script>';
	  }
	   if(isset($_GET['notcorrect']))
	   {
	               
	       echo '<script>alert("Username and Password are Incorrect")</script>';
	   }
	 ?>

</body>
</html>