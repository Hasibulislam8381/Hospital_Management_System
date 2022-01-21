<?php include('partials/menu.php'); ?>

<!--main section starts--> 
<div class="main-content">
    <div class="wrapper">
    <h1>Patient</h1>
   
    <br>
    <br><br>

    <!--Appoint Doctor section-->
    
            <br>
            <table class="tbl-full">
                <tr>
                    <th>ID</th>
                    <th>Patient Name</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Age</th>
                    <th>N_ID</th>
                    <td>Date/Time</td>
                  
                </tr>
                <?php

                    $sql="SELECT * FROM patient";

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
                        
                            $address =$row['address'];
                            $phone = $row['phone'];
                            $email =$row['email'];
                            $age = $row['age'];
                            $n_id = $row['n_id'];
                            $dt = $row['dt'];

                            ?>
                              
                            <tr>
                                 <td><?php echo $sn++; ?></td>
                                 <td><?php echo $username; ?></td>
                                 <td><?php echo $address; ?></td>
                                <td><?php echo $phone; ?></td>
                                <td><?php echo $email; ?></td>
                                <td><?php echo $age; ?></td>
                                <td><?php echo $n_id; ?></td>
                                <td><?php echo $dt; ?></td>


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
                            <td><div colspan="7" class="error">No Patient Addes</div></td>
                        </tr>

                        <?php

                    }

                
                ?>

            </table>
            <a href="index.php" class="btn-danger">BACK</a>

</div>
</div>


