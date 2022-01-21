<?php
//Authorization -Access control
//check whether the user is logged in or not
if(!isset($_SESSION['user']))//if use session is not set
{
   //user is not logged in
   //Redirect to login page with message
   $_SESSION['no-login-message'] = "<div class='error'>Please Login to Access As receptionist.</div>";
   echo "<script>window.location.href='http://localhost/hospital/admin/userpannel/receptionist-login.php';</script>";
}

?>
