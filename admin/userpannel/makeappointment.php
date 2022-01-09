<?php include('constants.php'); ?>

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
    <form action="userReceptionist.php" method="post">
      <fieldset>
        <legend><span class="number">1</span>Patients basic details</legend>
        <label for="name">Patient Name:</label>
        <input type="text" id="name" name="user_name" placeholder="patients name" required pattern="[a-zA-Z0-9]+">

        <label for="mail">Email:</label>
        <input type="email" id="mail" name="email" placeholder="abc@xyz.com" required>

        <label for="tel">Contact Num:</label>
        <input type="tel" id="tel" placeholder="contact" name="phone">
        <label for="mail">Address:</label>
        <input type="text"  name="address" placeholder="address" required>

       


      </fieldset>

      <fieldset>
        <legend><span class="number">2</span>Appointment Details</legend>
        <label for="appointment_for">Appointment for:</label>
        <select id="appointment_for" name="appointment_for" required>
          <option value="coffee">Medicine</option>
          <option value="meeting">Arthritis</option>
          <option value="Business">Eyes</option>
          <option value="lunch">Liver</option>
          <option value="skype">Diabetes</option>
          <option value="movie">constipation</option>
          <option value="couple_date">High blood pressure</option>
        </select>
        
        <label for="date">Date:</label>
        <input type="date" name="date"  required></input>
        <br>
        <label for="time">Time:</label>
        <input type="time" name="time"  required></input>
        <br>
        <label for="time">Patient type:</label>
        <input type="radio" name="ptype"  required>New</input>
        <input type="radio" name="ptype"  required>Regular</input>

    
      </fieldset>
      <button type="submit">Request For Appointment</button>
    </form>
  </div>
</body>

</html>