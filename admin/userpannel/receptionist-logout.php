<?php
   //include constant.php
   include('constants.php');
  //destroy the session and redirect to login page
  session_destroy();

  //Redirect to login page
  echo "<script>window.location.href='http://localhost/hospital/admin/userpannel/receptionist-login.php';</script>";

?>