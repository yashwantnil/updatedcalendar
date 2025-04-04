<?php
include("db.php");
include("ICal\ICal.php");
include("ICal\Event.php");
use ICal\ICal;
$calllink='';
try {
	foreach (new DirectoryIterator(__DIR__) as $file) {
  if ($file->isFile()) {
	  if(strpos($file->getFilename(),"_ical")>0)
	  {
		$icsFile = $file->getFilename();
	
    $ical = new ICal($icsFile, array(
        'defaultSpan'                 => 2,     // Default value
        'defaultTimeZone'             => 'UTC',
        'defaultWeekStart'            => 'MO',  // Default value
        'disableCharacterReplacement' => false, // Default value
        'filterDaysAfter'             => null,  // Default value
        'filterDaysBefore'            => null,  // Default value
        'httpUserAgent'               => null,  // Default value
        'skipRecurrence'              => false, // Default value
    ));
   


        $showExample = array(
          'all'      => true,
        );
   
        if ($showExample['all']) {
            $events = $ical->sortEventsWithOrder($ical->events());
   
    $count = 1;
    foreach ($events as $event) : 
     $subject=($event->summary ?? 'N/A');
	$start = ($event->dtstart ?? 'N/A');
	$end = ($event->dtend ?? 'N/A');
	$date = date("Y-m-d");
	$tz=($event->tzid ?? 'UTC');
	$to = 'sp@is4sb.com';
	$insertQuery = "INSERT INTO events (title, calllink,start_datetime, end_datetime,idate,itimezone,iinvite) VALUES ('".$subject."', '".$calllink."','$start', '$end','$date', '$tz', '$to')";
    echo $insertQuery."<br>";
	$conn->query($insertQuery);
	
	 
	
    endforeach;
    }
		$moveFile="processed/".$icsFile;
		if (copy($icsFile,$moveFile)) 
			{
				unlink($icsFile);
			}
	  }
  }
	}  
$conn->close();

} catch (\Exception $e) {
    die($e);
}	
	?>