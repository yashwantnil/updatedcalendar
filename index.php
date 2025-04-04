<!DOCTYPE html>
<html>
<head>
<link href='css/fullcalendar.css' rel='stylesheet' />
<link href='css/fullcalendar.print.css' rel='stylesheet' media='print' />
<script src='js/jquery.js'></script>
<script src='js/jquery-ui.js'></script>
<script src='js/fullcalendar.js'></script>

<?php
include("db.php");

$sql = "SELECT id,title, start_datetime as start, end_datetime as end FROM events order by id desc";
$result = $conn->query($sql);

$events = [];

?>
<script type="text/javascript">

$(document).ready(function() 
{ 
var date = new Date();
var d = date.getDate(); 
var m = date.getMonth(); 
var y = date.getFullYear(); 

$("#calendar").fullCalendar({ 
editable: true, 
events: [
<?php
 $rowcount=mysqli_num_rows($result);
 
$cnt =0;
while ($row = $result->fetch_assoc()) {
	$cnt++;
	$start = $row['start'];
	$start_part = explode(" ",$start);
	$date_part = explode("-",$start_part[0]);
	
	$day = intval($date_part[2]);
	$month = intval($date_part[1]-1);
	$year = intval($date_part[0]);
	$time_part = explode(":",$start_part[1]);
	$sthh = intval($time_part[0]);
	$stmm = intval($time_part[1]);
	
	
	$end = $row['end'];
	$end_part = explode(" ",$end);
	$date_part1 = explode("-",$end_part[0]);
	
	$day1 = intval($date_part1[2]);
	$month1 = intval($date_part1[1])-1;
	$year1 = intval($date_part1[0]);
	$time_part1 = explode(":",$end_part[1]);
	$ethh = intval($time_part1[0]);
	$etmm = intval($time_part1[1]);
	
	$events[] = $row;
if($cnt!=$rowcount)
{
?>
{
title: '<?php echo trim($row['title']);?>',
start: new Date(<?php echo $year;?>,<?php echo $month;?>,<?php echo $day;?>,<?php echo $sthh;?>,<?php echo $stmm;?>),
end: new Date(<?php echo $year1;?>,<?php echo $month1;?>,<?php echo $day1;?>,<?php echo $ethh;?>,<?php echo $etmm;?>),
allDay: false
},
<?php
}
else
{
	?>
	{
title: '<?php echo trim($row['title']);?>',
start: new Date(<?php echo $year;?>,<?php echo $month;?>,<?php echo $day;?>,<?php echo $sthh;?>,<?php echo $stmm;?>),
end: new Date(<?php echo $year1;?>,<?php echo $month1;?>,<?php echo $day1;?>,<?php echo $ethh;?>,<?php echo $etmm;?>),
allDay: false
}
<?php
}
}
?>
<?php
$conn->close();
?>
]
		});
		
	});


</script>

<style>

	body {
		margin-top: 40px;
		text-align: center;
		font-size: 14px;
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
		}

	#calendar {
		width: 900px;
		margin: 0 auto;
		}

</style>
</head>
<body>

<div id='calendar'></div>
</body>
</html>