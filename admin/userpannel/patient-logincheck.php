<?php
//Authorization -Access control
//check whether the user is logged in or not
if(!isset($_SESSION['userpatient']))//if use session is not set
{
   //user is not logged in
   //Redirect to login page with message
   $_SESSION['no-login-message'] = "<div class='error'>Please SignUp to Access As Patient.</div>";
   echo "<script>window.location.href='http://localhost/hospital/admin/userpannel/patient-login.php';</script>";
}

?>