<?php include('constants.php');
include('receptionist-login-check.php'); ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<link rel="stylesheet" href="../css/admin.css">
<!--main section starts--> 
<div class="main-content">
    <div class="wrapper">
   
    <br>
    

    <!--Appoint Doctor section-->
    
            <br>
            <table class="table table-dark table-striped">
           
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>Patient Request</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                <tr>
                    <th>Id</th>
                    <th>Patient Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Age</th>
                    <th>Request Date</th>
                    <th>Appointment For</th>
                  
                </tr>
                <?php

                    $sql="SELECT * FROM appointment_req";

                    //Execute the query
                    $res=mysqli_query($conn,$sql);

                    //count rows
                    $count = mysqli_num_rows($res);
                    //check whether we have data in database or not

                    //create serial number variable
                    

                    if($count>0)
                    {
                        //we have data in database
                        //get the data and display
                        while($row=mysqli_fetch_assoc($res))
                        {

                            $id = $row['id'];
                            $username = $row['user_name'];
                            $email =$row['email'];
                            $phone =$row['phone'];
                            $address = $row['address'];
                            $age =$row['age'];
                            $date = $row['Date'];
                            $appointment_for = $row['appointment_for'];


                            ?>
                              
                            <tr>
                                 <td><?php echo $id; ?></td>
                                 <td><?php echo $username; ?></td>
                                 <td><?php echo $email; ?></td>
                                <td><?php echo $phone; ?></td>
                                <td><?php echo $address; ?></td>
                                 <td><?php echo $age; ?></td>
                                 <td><?php echo $date; ?></td>
                                <td><?php echo $appointment_for; ?></td>

                                 


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
                            <td><div colspan="7" class="error">No patient Added</div></td>
                        </tr>

                        <?php

                    }

                
                ?>

            </table>
            <a href="userReceptionist.php" class="btn-danger">BACK</a>

</div>
</div>


