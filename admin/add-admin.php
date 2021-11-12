<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br><br>

        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name</td>
                    <td><input type="text" name="full_name" placeholder="Enter Your full name"></td>
                    
                </tr>

                <tr>
                    <td>Username</td>
                    <td>
                        <input type="text" name="username" placeholder="Your Username">
                    </td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td>
                        <input type="password" name="password" placeholder="Your Password">
                    </td>
                        
                    
                </tr>

                <tr >
                    <td colspan="2" >
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">

                    </td>
                </tr>
            </table>
        </form>

    </div>

</div>
<?php include('partials/footer.php'); ?>

<?php
//process the from form and save into the database
//cheak whether the button is clicked or not
if(isset($_POST['submit']))
{
    //button clicked
    //echo "Button clicked";
    //Get data from form
    $full_name=$_POST['full_name'];
    $username=$_POST['username'];
    $password=md5($_POST['password']);
    //SQL query to save data into the database
    $sql="INSERT INTO manage_admin SET
        full_name='$full_name',
        username='$username',
        password='$password'
    ";
  
    //executing query and saving data into database
    $res = mysqli_query($conn,$sql) or die(mysqli_error());
    if($res==TRUE)
    {
        echo "data inserted";
    }
    else{
        echo "not inserted";
    }
}

?>