<?php include('constants.php');
  include('receptionist-login-check.php'); ?>

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
       if(isset($_SESSION['make_appointment']))
       {
         echo $_SESSION['make_appointment'];
         unset($_SESSION['make_appointment']);
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
        <input type="tel"  placeholder="contact" name="phone">
        <label>Address:</label>
        <input type="text"  name="address" placeholder="address" required>

       


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
        
        <label>Date:</label>
        <input type="date" name="date"  required></input>
        <br>
        <label>Time:</label>
        <input type="time" name="time"  required></input>
        <br>
        <label>Patient type:</label>
        <input type="radio" name="ptype" value="New"  required>New
        <input type="radio" name="ptype" value="Regular"  required>Regular

    
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
     $appointment_for=$_POST['appointment_for'];
     $date=$_POST['date'];
     $time=$_POST['time'];
     if(isset($_POST['ptype'])){
       $ptype=$_POST['ptype'];
     }
     else{
       $ptype="new";
     }

     $sql= "INSERT INTO make_appointment SET
            user_name='$user_name',
            email='$email',
            phone='$phone',
            address='$address',
            appointment_for='$appointment_for',
            date='$date',
            time='$time',
            ptype='$ptype'
            ";
    $res= mysqli_query($conn,$sql);
    if($res==true)
    {
      $_SESSION['make_appointment']="<div class='success'>Appointment Successfull!</div>";
      header('location:'.SITEURL.'admin/userpannel/userReceptionist.php');
    }
    else{
        $_SESSION['make_appointment']="<div class='error'>Appointment filed</div>";
        header('location:'.SITEURL.'admin/userpannel/makeappointment.php');
     }
     
  }


