<?php
function build_calendar($month,$year)
{
    $daysOfWeek = array('Sunday', 'Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');

}
// What is the first day of the month in question?
$firstDayOfMonth = mktime(0,0,0,$month,1,$year);

// How many days does this month contain?
$numberDays = date('t',$firstDayOfMonth);

// Retrieve some information about the first day of the
// month in question.
$dateComponents = getdate($firstDayOfMonth);

// What is the name of the month in question?
$monthName = $dateComponents['month'];

// What is the index value (0-6) of the first day of the
// month in question.
$dayOfWeek = $dateComponents['wday'];

$datetoday = date('Y-m-d'); 
$calendar = "<table class='table table-bordered'>"; 
$calendar .= "<center><h2>$monthName $year</h2>"; 
$calendar .= "<tr>"; 
// Create the calendar headers 
foreach($daysOfWeek as $day) { 
     $calendar .= "<th class='header'>$day</th>"; 
} 
// Create the rest of the calendar
// Initiate the day counter, starting with the 1st. 
$currentDay = 1;
$calendar .= "</tr><tr>";
// The variable $dayOfWeek is used to 
// ensure that the calendar 
// display consists of exactly 7 columns.
if($dayOfWeek > 0) { 
    for($k=0;$k<$dayOfWeek;$k++){ 
        $calendar .= "<td class='empty'></td>"; 
    } 
}
$month = str_pad($month, 2, "0", STR_PAD_LEFT);
while ($currentDay <= $numberDays) { 
    //Seventh column (Saturday) reached. Start a new row. 
    if ($dayOfWeek == 7) { 
        $dayOfWeek = 0; 
        $calendar .= "</tr><tr>"; 
    } 
    $currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT); 
    $date = "$year-$month-$currentDayRel"; 
    $dayname = strtolower(date('l', strtotime($date))); 
    $eventNum = 0; 
    $today = $date==date('Y-m-d')? "today" : "";
    $calendar.="<td><h4>$currentDay</h4>"; 
    $calendar .="</td>"; 
    //Increment counters 
    $currentDay++; 
    $dayOfWeek++; 
} 
//Complete the row of the last week in month, if necessary 
if ($dayOfWeek != 7) { 
    $remainingDays = 7 - $dayOfWeek; 
    for($l=0;$l<$remainingDays;$l++){ 
        $calendar .= "<td class='empty'></td>"; 
    } 
} 

$calendar .= "</tr>"; 
$calendar .= "</table>";

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
                        $month=$dateComponents['mon'];
                        $year=$dateComponents['year'];
                        echo build_calendar($month,$year);


                ?>

            </div>

        </div>

    </div>
    
</body>
</html>