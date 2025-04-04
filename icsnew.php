<?php
// Email server credentials
$hostname = '{mail.is4sb.com:993/imap/ssl}INBOX'; // Change based on your email provider
$username = 'sp@is4sb.com';
$password = 'Trythis1233'; // Use App Password if using Gmail

// Connect to mailbox
$inbox = imap_open($hostname, $username, $password) or die("Cannot connect: " . imap_last_error());

// Search for calendar invite emails (subject containing "Invitation" or ".ics" attachment)
$emails = imap_search($inbox, 'UNSEEN');
//$emails = imap_search($inbox, 'ALL');
if ($emails) {
    foreach ($emails as $email_number) {
        $structure = imap_fetchstructure($inbox, $email_number);
        
        // Loop through attachments
        if (isset($structure->parts) && count($structure->parts)) {
            for ($i = 0; $i < count($structure->parts); $i++) {
                $part = $structure->parts[$i];
                if ($part->subtype == "CALENDAR") 
				{
                    // Decode and save the ICS file
                    $body = imap_fetchbody($inbox, $email_number, $i+1);
                    $icsData = base64_decode($body);
                    file_put_contents("downloaded_ical_".time().".ics", $icsData);
                    //echo "ICS file saved successfully!<br>";
                }
            }
        }
    }
	echo "ICS file saved successfully!<br>";
} else {
    echo "No calendar invites found!";
}

// Close connection
imap_close($inbox);
?>