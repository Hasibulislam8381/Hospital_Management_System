<?php include('constants.php'); 
include('patient-logincheck.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
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
              $q=mysqli_query($conn,"SELECT * FROM patient WHERE username='$_SESSION[userpatient]'; ");
            ?>
            <h2>My Profile</h2>
            <?php
               $row = mysqli_fetch_assoc($q);
              
            ?>
            <div class="text-center"><b>WELLCOME</b></div>
        <br><br>

            <?php
            echo "<b>";
      echo "<table class='table table-dark table-striped'>";
      echo "<tr>";
                    echo "<td>";
                    echo "<b>Username:</b>";
                    echo "</td>";
                    echo "<td>";
                    echo $_SESSION['userpatient'];
                    echo "</td>";
      echo "</tr>";
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
                echo "<b>Address:</b>";
                echo "</td>";
                echo "<td>";
                echo $row['address'];
                echo "</td>";
        echo "</tr>";

        echo "<tr>";
                echo "<td>";
                echo "<b>Phone:</b>";
                echo "</td>";
                echo "<td>";
                echo $row['phone'];
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
        echo  "<tr>";
                echo "<td>";
                echo "<b>Age:</b>";
                echo "</td>";
                echo "<td>";
                echo $row['age'];
                echo "</td>";
        echo  "</tr>";
      echo "</table>";
      echo "</b>";
      

      ?>

      </div>

      
  </div>
  <br><br><center><a href="userPatient.php" class="btn-danger">BACK</a></center>
    
</body>
</html>