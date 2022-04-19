<?php
session_start();
session_destroy();
header('Location:../admin/pages-login.php');
?>