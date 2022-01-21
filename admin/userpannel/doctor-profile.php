<?php include('constants.php'); 
include('doctor-login-check.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/receptionist-profile.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profile</title>
</head>
<body style="background-color:#00d2d3 ; ">
  <div class="container">
      <form action="" method="post">
          <button class="btn btn-default" style="float:right; width=70px;" name="submit1">Edit</button>
      </form>
      <div class="wrapper">
            <?php
              $q=mysqli_query($conn,"SELECT * FROM add_doctor WHERE username='$_SESSION[userdoctor]'; ");
            ?>
            <h2>My Profile</h2>
            <?php
               $row = mysqli_fetch_assoc($q);
               $image_name =$row['image_name'];
               $_SESSION['image_name']=$image_name;
               
               //check wheather image name is available or not
               if($image_name!="")
               {
                   //display the image
                   ?>
                  <div class="text-center"> <img src="<?php echo SITEURL; ?>images/add-doctor/<?php echo $_SESSION['image_name']; ?>" width="100px"></div>
                   <?php
               }
               else{
                   //display the message
                   echo "<div class='error'>No Image Added</div>";
               }
              
            ?>
            <div class="text-center"><b>WELLCOME</b></div>
            <h4 class="text-center">
                <?php echo $_SESSION['userdoctor']; ?>
            </h4>

            <?php
            echo "<b>";
      echo "<table class='table table-bordered'>";
        echo "<tr>";
                    echo "<td>";
                    echo "<b>Id:</b>";
                    echo "</td>";
                    echo "<td>";
                    echo $row['id'];
                    echo "</td>";
        echo "</tr>";
        echo "<tr>";
                echo "<td>";
                echo "<b>Email:</b>";
                echo "</td>";
                echo "<td>";
                echo $row['email'];
                echo "</td>";
        echo "</tr>";

        echo "<tr>";
                echo "<td>";
                echo "<b>Mobile:</b>";
                echo "</td>";
                echo "<td>";
                echo $row['mobile'];
                echo "</td>";
        echo "</tr>";
        echo "<tr>";
                echo "<td>";
                echo "<b>Degree:</b>";
                echo "</td>";
                echo "<td>";
                echo $row['degree'];
                echo "</td>";
        echo "</tr>";
        echo  "<tr>";
                echo "<td>";
                echo "<b>Active Status:</b>";
                echo "</td>";
                echo "<td>";
                echo $row['active'];
                echo "</td>";
        echo  "</tr>";
      echo "</table>";
      echo "</b>";
      

      ?>

      </div>

      
  </div>
  <br><br><center><a href="userDoctor.php" class="btn-danger">BACK</a></center>
    
</body>
</html>