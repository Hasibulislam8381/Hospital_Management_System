<?php
//create constant for non repeting value
  define('LOCALHOST','localhost'); 
  define('DB_USERNAME','root'); 
  define('DB_PASSWORD','');
  define('DB_NAME','project');
  //execute query and save data into database
  $conn = mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die(mysqli_error());//database connection
  $db_select = mysqli_select_db($conn,DB_NAME) or die(mysqli_error());//selecting database
?>