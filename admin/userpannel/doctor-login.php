<?php 
   include('constants.php');
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/receptionist-login.css">
    <link rel="stylesheet" href="../css/admin.css">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div id="login">
        <h3 class="text-center text-white pt-5">Login form</h3>
        
    
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="" method="post">
                            <h3 class="text-center text-info">Login</h3>
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
                            <div class="form-group">
                                <label for="username" class="text-info">Username:</label><br>
                                <input type="text" name="username" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="text" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="remember-me" class="text-info"><span>Remember me</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br>
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
                                <a href="userpannel.php" class="btn-danger">BACK</a>
                            </div>
                            
                            <div id="register-link" class="text-right">
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php
//check whether the submit button is clicked or not
if(isset($_POST['submit']))
{
    //get dara from login form
    $username = $_POST['username'];
    $password = $_POST['password'];
    //check whether the username and password exist or not
    $sql = "SELECT * FROM add_doctor WHERE username = '$username' AND password = '$password'";

    //execute the query
    $res = mysqli_query($conn,$sql);
    $count = mysqli_num_rows($res);
    if($count==1)
    {
        //user available and login success
        $_SESSION['login']="<div class='success'>Login Success</div>";
        $_SESSION['userdoctor']=$username;
        echo "<script>window.location.href='http://localhost/hospital/admin/userpannel/userDoctor.php';</script>";
    }
    else{
        $_SESSION['login']="<div class='error text-center'>User name or password did not match</div>";
        echo "<script>window.location.href='http://localhost/hospital/admin/userpannel/doctor-login.php';</script>";
    }
}
?>
