<?php
//Authorization -Access control
//check whether the user is logged in or not
if(!isset($_SESSION['userdoctor']))//if use session is not set
{
   //user is not logged in
   //Redirect to login page with message
   $_SESSION['no-login-message'] = "<div class='error'>Please Login to Access As Doctor.</div>";
   echo "<script>window.location.href='http://localhost/hospital/admin/userpannel/doctor-login.php';</script>";
}

?>