<?php include('partials/menu.php'); ?>
  


    <!--main section starts--> 
    <div class="main-content">
        <div class="wrapper">
            <h1>Manage Admin</h1>
            <br>
            <?php if(isset($_SESSION['add'])){
              
                     echo $_SESSION['add'];//displayig session message
                    unset($_SESSION['add']);//removing session message
                }
                if(isset($_SESSION['delete'])){
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);
                }
                if(isset($_SESSION['update'])){
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                }
            ?>
            <br><br><br>
            <!-- button to add admin-->
            <a href="add-admin.php" class="btn-primary">Add Admin</a>
            <br><br><br>
            <table class="tbl-full">
                <tr>
                    <th>S.N.</th>
                    <th>Full Name</th>
                    <th>User Name</th>
                    <th>Actions</th>
                </tr>
                <?php
                //query to get all admin
                $sql="SELECT * FROM manage_admin";
                //execute the query
                $res= mysqli_query($conn,$sql);
                //cheak the query executed or not
                if($res==TRUE)
                {
                    $count = mysqli_num_rows($res);//fuction to get all the rows from database
                    $sn=1;
                    //cheak how many rows
                    if($count>0)
                    {
                        //we have data in database
                        while($rows=mysqli_fetch_assoc($res))
                        {
                            //using while loop we will get all the data from database
                            //while loop will execute as long as we have data into database
                            //get all the individual data from database
                            $id = $rows['id'];
                            $full_name = $rows['full_name'];
                            $username = $rows['username'];

                         
                            ?>
                   <!--display all the value in our table-->
                 <tr>
                    <td> <?php echo $sn++; ?></td>
                    <td><?php echo $full_name; ?></td>
                    <td><?php echo $username; ?></td>
                    <td>
                        <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo$id;?>" class="btn-primary">Change Password</a>
                        <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo$id;?>" class="btn-secondary">Update Admin</a>
                        <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-danger">Delete Admin</a>
                    </td>
                 </tr>

                            <?php


                        }
                    }
                    else{
                        //we dont have value in database
                    }
                    
                }
                else{

                }
                ?>
                
            </table>

        </div>
   </div>
    <!--main section ends-->


<?php include('partials/footer.php'); ?>
