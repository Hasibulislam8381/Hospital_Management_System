<?php
$error=NULL;
if (isset($_POST['submit'])){
    $u=$_POST['u'];
    $p=$_POST['p'];
    $p2=$_POST['p2'];
    $e=$_POST['e'];


    if(strlen($u) < 5){
        $error = "<p>User name must be at least 5 charecter</p>";
    }
        elseif ($p2 != $p) {
            $error="<p>Your password do not match</p>";
        }
        else{
            $mysqli = NEW MySQLi('localhost','root','','project');
            $u = $mysqli->real_escape_string($u);
            $p = $mysqli->real_escape_string($p);
            $p2 = $mysqli->real_escape_string($p2);
            $e = $mysqli->real_escape_string($e);



            $vkey = md5(time().$u);
            
            //inserting data into the database

            $p=md5($p);
            $insert=$mysqli->query("INSERT INTO accounts(username,password,email,vkey)
            VALUES('$u','$p','$e','$vkey')");

            if($insert){
             echo "Success";
            }
            else{
                echo $mysqli->error;
            }
            
          

            
            
        }
            

            

        }
    
    




    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="registration.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="login-page">
    <div class="form">
    <form class="register-form" method="POST" action="">

    <table>
        <tr>
            <td align="right">Username:</td>
            <td><input type="text" name="u" required/></td>

        </tr>

        <tr>
            <td align="right">Password:</td>
            <td><input type="password" name="p" required/></td>
            
        </tr>

        <tr>
            <td align="right">Retype Password:</td>
            <td><input type="password" name="p2" required/></td>
            
        </tr>

     

        <tr>
            <td align="right">Email:</td>
            <td><input type="email" name="e" required/></td>
            
        </tr>

        <tr>
            <td colspan="2" align="center"><input type="submit" name="submit" value="Register" required/></td>
        </tr>
    </table>
    </form>
    </div>
    </div>
    <center>
     <?php
        $error=NULL;
    ?>
    </center>
</body>
</html>