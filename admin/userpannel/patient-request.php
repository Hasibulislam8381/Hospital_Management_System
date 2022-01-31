<?php include('constants.php');
  include('patient-logincheck.php'); ?>

<html lang="en">
<head>
<script type="text/javascript" src="https://github.com/rubyeffect/easy_fill/tree/master/lib/easy_fill-0.0.1.min.js"></script>
  <title></title>
  <link rel="stylesheet" type="text/css" href="../css/appointment.css" />
</head>

<body>
  <div id="container">
    <!--This is a division tag for body container-->
    <div id="body_header">
      <!--This is a division tag for body header-->
      <h1>Patients Appointment Request Form</h1>
    

    </div>
    <?php
       if(isset($_SESSION['appointment_req']))
       {
         echo $_SESSION['appointment_req'];
         unset($_SESSION['appointment_req']);
       }

    ?>
    <form action="" method="post">
      <fieldset>
        <legend><span class="number">1</span>Patients basic details</legend>
        <label>Patient Name:</label>
        <input type="text" name="user_name" placeholder="patients name" required pattern="[a-zA-Z0-9]+">

        <label>Email:</label>
        <input type="email" name="email" placeholder="abc@xyz.com" required>

        <label>Contact Num:</label>
        <input type="tel"  placeholder="contact" name="phone" required>
        <label>Address:</label>
        <input type="text"  name="address" placeholder="address" required>
        <label>Age:</label>
        <input type="text"  name="age" placeholder="Your Age" required>
        <label>Date for Appoinment:</label>
        <input type="date" name="date"  required></input>

       


      </fieldset>

      <fieldset>
        <legend><span class="number">2</span>Appointment Details</legend>
        <label>Appointment for:</label>
        <select  name="appointment_for" required>
          <option value="Medicine">Medicine</option>
          <option value="Arthritis">Arthritis</option>
          <option value="Eyes">Eyes</option>
          <option value="Liver">Liver</option>
          <option value="Diabetes">Diabetes</option>
          <option value="constipation">constipation</option>
          <option value="High blood pressure">High blood pressure</option>
        </select>
        
       
      

    
      </fieldset>
      <button type="submit" name="submit">Request For Appointment</button>
    </form>

  </div>
</body>

</html>
<?php
  if(isset($_POST['submit']))
  {
    
     $user_name=$_POST['user_name'];
     $email=$_POST['email'];
     $phone=$_POST['phone'];
     $address=$_POST['address'];
     $age=$_POST['age'];
     $date=$_POST['date'];
     $appointment_for=$_POST['appointment_for'];


     $sql= "INSERT INTO appointment_req SET
            
            user_name='$user_name',
            email='$email',
            phone='$phone',
            address='$address',
            age='$age',
            date='$date',
            appointment_for='$appointment_for',
            dt=current_timestamp()
            ";
    $res= mysqli_query($conn,$sql);
    if($res==true)
    {
      $_SESSION['appointment_req']="<div class='success'>Request sent</div>";
      header('location:'.SITEURL.'admin/userpannel/userPatient.php');
    }
    else{
        $_SESSION['appointment_req']="<div class='error'>Request filed</div>";
        header('location:'.SITEURL.'admin/userpannel/patient-request.php');
     }
     
  }


