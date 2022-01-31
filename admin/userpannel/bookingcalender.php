<?php
function build_calendar($month,$year)
{
    $mysqli=new mysqli('localhost','root','','project');
   /* $stmt=$mysqli->prepare("select * from bookings where MONTH(date)=? AND YEAR(date)=?");
    $stmt->bind_param('ss',$month,$year);
    $bookings=array();
    if($stmt->execute()){
        $result=$stmt->get_result();
        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
                $bookings[]=$row['date'];
            }
            $stmt->close();
        }
    }*/



    //first of all we'll create an array containing names of all days in a week
    $daysOfWeek=array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
    //THen we will get First day of the month that is in the argument of this function
    $firstDayOfMonth=mktime(0,0,0,$month, 1,$year);
    //Getting the num of days in this  month contains
    $numberDays=date('t',$firstDayOfMonth);
    //getting some information about the first day of this moth
    $dateComponents = getdate($firstDayOfMonth);
    //getting the name of this month
    $monthName=$dateComponents['month'];
    //getting the index value 0-6 the first day of this month
    $dayOfWeek=$dateComponents['wday'];
    //getting the current date
    $dateToday=date('Y-m-d');

    //now creating the Html table


   
    
    $prev_month=date('m',mktime(0,0,0,$month-1,1,$year));
    $prev_year=date('Y',mktime(0,0,0,$month-1,1,$year));
    $next_month=date('m',mktime(0,0,0,$month+1,1,$year));
    $next_year=date('Y',mktime(0,0,0,$month+1,1,$year));
    $calendar="<center><h2>$monthName $year</h2>";

    $calendar.="<a class='btn btn-primary btn-xs' href='?month=".$prev_month."&year=".$prev_year."'>Previous Month</a>";

    $calendar.="<a class='btn btn-xs btn-primary' href='?month=".date('m')."&year=".date('Y')."'>Current Month</a>";

    $calendar.="<a class='btn btn-xs btn-primary' href='?month=".$next_month."&year=".$next_year."'>Next Month</a><br>";
    $calendar.="<a class='btn btn-xs btn-danger' href='userReceptionist.php'>BACK</a></center>";

    
      
    $calendar.="<br><table class='table table-bordered'>";
    $calendar.="<tr>";
    //creating the calendar headers
    foreach($daysOfWeek as $day)
    {
        $calendar.="<th class='header'>$day</th>";
    }

    $calendar.="</tr><tr>";
    $currentDay=1;
    if($dayOfWeek>0)
    {
        for($k=0;$k<$dayOfWeek;$k++){
            $calendar.="<td class='empty'></td>";
        }
    }

    $month = str_pad($month,2,"0",STR_PAD_LEFT);
    while($currentDay<=$numberDays){
        if($dayOfWeek==7){
            $dayOfWeek=0;
            $calendar.="</tr><tr>";
        }
        $currentDayRel=str_pad($currentDay,2,"0",STR_PAD_LEFT);
        $date="$year-$month-$currentDayRel";
        $dayName=strtolower(date('I',strtotime($date)));
        $today=$date==date('Y-m-d')? 'today':'';
     
         

        if($date<date('Y-m-d')){
            $calendar.="<td><h4>$currentDay</h4> <button class='btn btn-danger btn-xs'>N/A</button>";
        }else{
             $calendar.="<td class='$today'><h4>$currentDay</h4> <a href='book1.php?date=".$date."' class='btn btn-success btn-xs'>Book</a>";
        }

        
        $currentDay++;
        $dayOfWeek++;

    }
    if($dayOfWeek<7){
        $remainingDays=7-$dayOfWeek;
        for($i=0;$i<$remainingDays;$i++){
            $calendar.="<td class='empty'></td>";
        }

    }
    $calendar.="</tr></table>";


    return $calendar;
    }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{
            table-layout:fixed;
        }
        td{
            width:33%;

        }
        .today{
            background:yellow;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                    $dateComponents=getdate();
                    if(isset($_GET['month'])&& isset($_GET['year'])){
                        $month=$_GET['month'];
                        $year=$_GET['year'];
                    }
                    else{
                        $month=$dateComponents['mon'];
                        $year=$dateComponents['year'];
                    }
                    echo build_calendar($month,$year);


                ?>

            </div>

        </div>

    </div>
    
</body>
</html>