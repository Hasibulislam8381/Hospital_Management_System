<?php include('constants.php');
include('receptionist-login-check.php'); ?>

<link rel="stylesheet" href="../css/admin.css">
<!--main section starts--> 
<div class="main-content">
    <div class="wrapper">
    <h1>Doctor</h1>
   
    <br>
    <br><br>

    <!--Appoint Doctor section-->
    
            <br>
            <table class="tbl-full">
                <tr>
                    <th>S.N.</th>
                    <th>Doctor Name</th>
                    <th>Email</th>
                    <th>Age</th>
                    <th>Image</th>
                    <th>Active</th>
    
                  
                </tr>
                <?php

                    $sql="SELECT * FROM add_receptionist where ";

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
                            $age=$row['age'];
                            $image_name =$row['image_name'];
                            $active = $row['active'];

                            ?>
                              
                            <tr>
                                 <td><?php echo $sn++; ?></td>
                                 <td><?php echo $username; ?></td>
                                 <td><?php echo $email; ?></td>
                                <td><?php echo $age; ?></td>

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
                            <td><div colspan="7" class="error">No Receptionist Added</div></td>
                        </tr>

                        <?php

                    }

                
                ?>

            </table>
            <a href="userReceptionist.php" class="btn-danger">BACK</a>

</div>
</div>


