<?php
include("db.php");
function parseICS($file) {
    $icsData = file_get_contents($file);
    $events = [];
    $lines = explode("\n", $icsData);
    $event = [];

    foreach ($lines as $line) {
        $line = trim($line);

        if (strpos($line, "BEGIN:VEVENT") !== false) {
            $event = [];
        } elseif (strpos($line, "END:VEVENT") !== false) {
            $events[] = $event;
        } else {
            // Handle multi-line values
            if (preg_match('/^\s/', $line)) {
                $event[key($event)] .= " " . trim($line);
                continue;
            }

            // Extract key-value pairs
            $parts = explode(":", $line, 2);
            if (count($parts) == 2) {
                $key = trim($parts[0]);
                $value = trim($parts[1]);

                // Extract timezone if exists (e.g., DTSTART;TZID=America/New_York)
                if (strpos($key, 'DTSTART') !== false) {
                    list($timezone, $dateTime) = extractTimezoneAndDateTime($key, $value);
                    $event['DTSTART'] = formatDateTime($dateTime, $timezone);
                    $event['TZID'] = $timezone; // Store timezone separately
                } elseif (strpos($key, 'DTEND') !== false) {
                    list($timezone, $dateTime) = extractTimezoneAndDateTime($key, $value);
                    $event['DTEND'] = formatDateTime($dateTime, $timezone);
                } else {
                    $event[$key] = $value;
                }
            }
        }
    }
    return $events;
}

// Function to extract timezone and datetime
function extractTimezoneAndDateTime($key, $value) {
    if (strpos($key, 'TZID=') !== false) {
        preg_match('/TZID=([^:]+):(.+)/', $key . ':' . $value, $matches);
        return [$matches[1] ?? 'UTC', $matches[2] ?? $value];
    }
    return ['UTC', $value]; // Default to UTC if no timezone found
}

// Function to format date/time
function formatDateTime($icsDateTime, $timezone) {
    $dateTime = DateTime::createFromFormat('Ymd\THis', $icsDateTime, new DateTimeZone($timezone));
    return $dateTime ? $dateTime->format('Y-m-d H:i:s') : 'N/A';
}
foreach (new DirectoryIterator(__DIR__) as $file) {
  if ($file->isFile()) {
	  if(strpos($file->getFilename(),"_invite")>0)
	  {
		//print $file->getFilename() . "<br>";
		// Usage
$icsFile = $file->getFilename(); // Replace with your ICS file path
try
	{
$events = parseICS($icsFile);
echo $icsFile."<br>";
	}
catch(Exception $e)
	{
		
	}
	
$calllink="";
foreach ($events as $event) {
	
	echo "Event Summary: " . ($event['SUMMARY'] ?? 'N/A') . "<br>";
    echo "Start Date: " . ($event['DTSTART'] ?? 'N/A') . "<br>";
    echo "End Date: " . ($event['DTEND'] ?? 'N/A') . "<br>";
    echo "Timezone: " . ($event['TZID'] ?? 'UTC') . "<br>";
    echo "Location: " . ($event['LOCATION'] ?? 'N/A') . "<br>";
    echo "Description: " . ($event['DESCRIPTION'] ?? 'N/A') . "<br>";
    echo "-----------------------------------<br>";
	$subject=($event['SUMMARY'] ?? 'N/A');
	$start = ($event['DTSTART'] ?? 'N/A');
	$end = ($event['DTEND'] ?? 'N/A');
	$date = date("Y-m-d");
	$tz=($event['TZID'] ?? 'UTC');
	$to = 'sp@is4sb.com';
	$insertQuery = "INSERT INTO events (title, calllink,start_datetime, end_datetime,idate,itimezone,iinvite) VALUES ('".$subject."', '".$calllink."','$start', '$end','$date', '$tz', '$to')";
    echo $insertQuery."<br>";
	$conn->query($insertQuery);
	
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
?>