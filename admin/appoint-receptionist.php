<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
    <h1>Appoint Receptionist</h1>
    <br>
    <?php
        if(isset($_SESSION['add'])){
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }
    ?>
    <!--Appoint Receptionist section-->
    <a href="<?php echo SITEURL; ?>admin/add-receptionist.php" class="btn-primary">Add Receptionist</a>
            <br><br><br>
            <table class="tbl-full">
                <tr>
                    <th>S.N.</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>District</th>
                    <th>Age</th>
                    <th>n_id</th>
                    <th>Image</th>
                    <th>Active</th>
                    <th>Actions</th>
                </tr>
                <?php

                            $sql="SELECT * FROM add_receptionist";

                            //Execute the query
                            $res=mysqli_query($conn,$sql);

                            //count rows
                            $count = mysqli_num_rows($res);
                            //check whether we have data in database or not

                            //create serial number variable
                            $sn=1;

                            if($count>0)
                            {
                                //we have data in database
                                //get the data and display
                                while($row=mysqli_fetch_assoc($res))
                                {

                                    $id = $row['id'];
                                    $username = $row['username'];
                                    $email =$row['email'];
                                    $address=$row['address'];
                                    $district=$row['district'];
                                    $age=$row['age'];
                                    $n_id=$row['n_id'];
                                    $image_name =$row['image_name'];
                                    $active = $row['active'];

                                    ?>
                                    
                                    <tr>
                                        <td><?php echo $sn++; ?></td>
                                        <td><?php echo $username; ?></td>
                                        <td><?php echo $email; ?></td>
                                        <td><?php echo $address; ?></td>
                                        <td><?php echo $district; ?></td>
                                        <td><?php echo $age; ?></td>
                                        <td><?php echo $n_id; ?></td>




                                        <td>
                                            <?php
                                            //check wheather image name is available or not
                                            if($image_name!="")
                                            {
                                                //display the image
                                                ?>
                                                <img src="<?php echo SITEURL; ?>images/add-receptionist/<?php echo $image_name; ?>" width="100px">
                                                <?php
                                            }
                                            else{
                                                //display the message
                                                echo "<div class='error'>No Image Added</div>";
                                            }
                                            ?>
                                            
                                        </td>

                                        <td><?php echo $active; ?></td>
                                        <td>
                                            <a href="<?php echo SITEURL; ?>admin/update-doctor.php?id=<?php echo $id; ?>" class="btn-secondary">Update Doctor</a>
                                            <a href="<?php echo SITEURL; ?>admin/delete-doctor.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?> " class="btn-danger">Delete Doctor</a>
                                        </td>


                                    </tr>


                                    <?php

                                }

                            }
                            else
                            {
                                //we dont have data in database
                                //we will display mwssage inside table
                                ?>
                                <tr>
                                    <td><div colspan="7" class="error">No Doctor Added</div></td>
                                </tr>

                                <?php

                            }


                            ?>
                
            </table>

</div>
</div>


<?php include('partials/footer.php'); ?>