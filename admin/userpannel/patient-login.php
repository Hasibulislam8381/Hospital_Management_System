<?php include('constants.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>

   
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/patient-login.css">
    <title>Document</title>
</head>
<body>

        <div class="wrapper">
            <div class="logo"> <img src="https://www.freepnglogos.com/uploads/twitter-logo-png/twitter-bird-symbols-png-logo-0.png" alt=""> </div>
            <div class="text-center mt-4 name">SIGNUP FOR LOGIN</div>
            <?php
            if(isset($_SESSION['login']))
            {
              echo $_SESSION['login'];
              unset($_SESSION['login']);
            }
            if(isset($_SESSION['no-login-message']))
            {
              echo $_SESSION['no-login-message'];
              unset($_SESSION['no-login-message']);
            }
          ?>
            <form class="p-3 mt-3" method="post">
                <div class="form-field d-flex align-items-center"> <span class="far fa-user"></span> <input type="text" name="username" id="userName" placeholder="Patient Name"> </div>
                <div class="form-field d-flex align-items-center"> <span class="fas fa-key"></span> <input type="password" name="password" id="pwd" placeholder="Password"> </div>
                <input type="submit" name="submit" class="btn btn-info btn-md" value="LOGIN"><br>
                <a href="userpannel.php"><button type="button" class="btn btn-danger">BACK</button></a>
                
            </form>
            <div class="text-center fs-6"> <a href="#">Forget password?</a> or <a href="patient-signup.php">Sign up</a> </div>
        </div>
       
    
</body>
    

</html>
<?php
if(isset($_POST['submit']))
{
    //get dara from login form
    $username = $_POST['username'];
    $password = $_POST['password'];
    //check whether the username and password exist or not
    $sql = "SELECT * FROM patient WHERE username = '$username' AND password = '$password'";

    //execute the query
    $res = mysqli_query($conn,$sql);
    $count = mysqli_num_rows($res);
    if($count==1)
    {
        //user available and login success
        $_SESSION['login']="<div class='success'>Login Success</div>";
        $_SESSION['userpatient']=$username;
        echo "<script>window.location.href='http://localhost/hospital/admin/userpannel/userPatient.php';</script>";
    }
    else{
        $_SESSION['login']="<div class='error text-center'>User name or password did not match</div>";
        echo "<script>window.location.href='http://localhost/hospital/admin/userpannel/patient-login.php';</script>";
    }
}
?>
