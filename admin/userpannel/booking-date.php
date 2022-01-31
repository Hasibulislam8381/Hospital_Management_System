<?php include('constants.php');
include('receptionist-login-check.php'); ?>
<?php
 $sql="SELECT * FROM make_appointment";

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

        $time=$row['time'];
     }
    }




$duration=30;
$cleanup=0;
$start="09:00";
$end="15:00";

function timeslots($duration,$cleanup,$start,$end){
    $start=new DateTime($start);
    $end=new DateTime($end);
    $interval=new DateInterval("PT".$duration."M");
    $cleanupInterval=new DateInterval("PT".$cleanup."M");
    $slots=array();

    for($intStart=$start;$intStart<$end;$intStart->add($interval)->add($cleanupInterval)){
        $endPeriod=clone $intStart;
        $endPeriod->add($interval);
        if($endPeriod>$end){
            break;
        }
        $slots[]=$intStart->format("H:iA")."-".$endPeriod->format("H:iA");
    }
    return $slots;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/appointment.css">
    <title>Document</title>
</head>
<body>
   <?php
   $dt = new DateTime;
   if (isset($_GET['year']) && isset($_GET['week'])) {
       $dt->setISODate($_GET['year'], $_GET['week']);
   } else {
       $dt->setISODate($dt->format('o'), $dt->format('W'));
   }
   $year = $dt->format('o');
   $week = $dt->format('W');
   $month = $dt->format('F');
   $year = $dt->format('Y');
   ?>
   
   
   <div class="container">
        <div class="row">
            <div class="col-md-12">
            <center>
                <h2><?php echo "$month $year";?></h2>
            <a class="btn btn-primary btn-xs" href="<?php echo $_SERVER['PHP_SELF'].'?week='.($week-1).'&year='.$year; ?>">Pre Week</a> <!--Previous week-->
            <a class="btn btn-primary btn-xs" href="<?php echo $_SERVER['PHP_SELF'].'?week='.($week+1).'&year='.$year; ?>">Next Week</a> <!--Next week-->
            </center>
              <br>
                <table class="table table-bordered button" >
                    <tr class="success">
                        
                        <?php
                        do {
                            if($dt->format('d M Y')==date('d M Y')){
                                echo "<td style='background:yellow'>" . $dt->format('l') . "<br>" . $dt->format('d M Y') . "</td>\n";
                            }
                            else{
                                echo "<td>" . $dt->format('l') . "<br>" . $dt->format('d M Y') . "</td>\n";
                            }
                           
                            $dt->modify('+1 day');
                        } while ($week == $dt->format('W'));
                        ?>
                    </tr>
     
                    <?php
                    
                      $timeslots=timeslots($duration,$cleanup,$start,$end);
                      foreach($timeslots as $ts){
                    ?>
                    <tr>
                        <td><button class="btn btn-success btn-xs" ><a href="makeappointment.php"><?php echo $ts; ?></a></button></td>
                        <td><button class="btn btn-success btn-xs" ><a href="makeappointment.php"><?php echo $ts; ?></a></button></td>
                        <td><button class="btn btn-success btn-xs" ><a href="makeappointment.php"><?php echo $ts; ?></a></button></td>
                        <td><button class="btn btn-success btn-xs" ><a href="makeappointment.php"><?php echo $ts; ?></a></button></td>
                        <td><button class="btn btn-success btn-xs" ><a href="makeappointment.php"><?php echo $ts; ?></a></button></td>
                        <td><button class="btn btn-success btn-xs" ><a href="makeappointment.php"><?php echo $ts; ?></a></button></td>
                        <td><button class="btn btn-success btn-xs" ><a href="makeappointment.php"><?php echo $ts; ?></a></button></td>

                    </tr>
                    <?php } ?>
                </table>

            </div>
        </div>
   </div>
 

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>