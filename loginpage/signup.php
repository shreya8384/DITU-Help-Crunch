<?php  
$servername ="localhost";
$username = "root";
$password = "root";
$dbname = "login";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

if(isset($_POST['submit'])){
    if($conn->connect_error){
        die("connection failed");
    }    
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $salt = "ditu-help-crunch";
    $password_encrypted = sha1($password.$salt);
    
    $query = "INSERT INTO signup (id, name, email, password) 
    VALUES (NULL, '$name', '$email', '$password_encrypted')";
    $run = mysqli_query($conn,$query) ;
    
    if($run){
        ?>
        <script>
            alert('Values have been inserted');
        </script>
        <?php
    }
    else{
        ?>
        <script>
            alert('Values did not insert');
        </script>
        <?php
    }
    
}    
    ?>
