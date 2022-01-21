<?php 
   if($_SERVER["REQUEST_METHOD"]== "POST"){
       include('constants.php');
       $showAlert = false;
       $username= $_POST["username"];
       $password= $_POST["password"];
       $address= $_POST["address"];
       $phone= $_POST["phone"];
       $email= $_POST["email"];
       $age=$_POST["age"];
       $n_id=$_POST["n_id"];
       $exists=false;
       if($exists==false){
        $sql= "INSERT INTO `patient` (`username`, `password`, `address`, `phone`, `email`, `age`, `n_id`, `dt`) VALUES ('$username', '$password', '$address', '$phone', '$email', '$age', '$n_id', current_timestamp())";
        
           $result = mysqli_query($conn,$sql);
           if(isset($result)){
               $showAlert = true;
           }
       }

   }
?>

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
            <?php
                    if(isset($showAlert))
                    {
                    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> Your account is now created and you can login.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>';

                    }
             ?>

            
            <div class="text-center mt-4 name">Signin Valid Info</div>
            <form class="p-3 mt-3" method="post">
                <div class="form-field d-flex align-items-center"> <span class="far fa-user"></span> <input type="text" name="username" id="userName" placeholder="Patient Name"> </div>
                <div class="form-field d-flex align-items-center"> <span class="fas fa-key"></span> <input type="password" name="password" id="pwd" placeholder="Password"> </div>
                <div class="form-field d-flex align-items-center"> <span class="fas fa-key"></span> <input type="text" name="address" id="pwd" placeholder="Address"> </div>
                <div class="form-field d-flex align-items-center"> <span class="fas fa-key"></span> <input type="text" name="phone" id="pwd" placeholder="Phone"> </div>
                <div class="form-field d-flex align-items-center"> <span class="fas fa-key"></span> <input type="email" name="email" id="pwd" placeholder="Email"> </div>
                <div class="form-field d-flex align-items-center"> <span class="fas fa-key"></span> <input type="text" name="age" id="pwd" placeholder="Age"> </div>
                <div class="form-field d-flex align-items-center"> <span class="fas fa-key"></span> <input type="text" name="n_id" id="pwd" placeholder="National Id(*valid)"> </div>
                <button class="btn mt-3">SignUp</button>
                
            </form>
            <a href="patient-login.php"> <button type="button" class="btn btn-danger">Back</button></a>
           
        </div>
    
</body>
    

</html>