<?php include('partials/menu.php'); ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Update Admin</h1>
        <br><br>

        <?php 
           //1.Get the id of the selected admin
           $id = $_GET['id'];
           //create sql query to get the details
           $sql = "SELECT * FROM manage_admin WHERE id=$id";

           //Execute the query
           $res = mysqli_query($conn,$sql);

           //cheak whether the query is executed or not
           if($res==true){
               $count = mysqli_num_rows($res);
               if($count==1){
                   echo "Admin avialable";
               }
               else{
                   header('location:'.SITEURL.'admin/manage-admin.php');
               }
           }
        ?>


        <form action="" method="POST">

        <table class="tbl-30">
            <tr>
                <td>Full Name</td>
                <td>
                    <input type="text" name="full_name" value="">
                </td>
                
            </tr>

            <tr>
                <td>Username</td>
                <td>
                    <input type="text" name="username" value="">
                </td>
            </tr>

            <tr>
                <td  colspan="2">
                    <input class="btn-secondary" type="submit" name="submit" value="Update Admin">
                </td>
            </tr>
        </table>

        </form>
    </div>

</div>


<?php include('partials/footer.php'); ?>
