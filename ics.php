<?php

// Email account details
$hostname = '{mail.is4sb.com:993/imap/ssl}INBOX'; // Change based on your email provider
$username = 'sp@is4sb.com';
$password = 'Trythis1233';

// Connect to IMAP server
$inbox = imap_open($hostname, $username, $password) or die("Cannot connect to mail server: " . imap_last_error());

// Search for emails with attachments (you can modify this search)
$emails = imap_search($inbox, 'UNSEEN');
//$emails = imap_search($inbox, 'ALL');
if ($emails) {
    rsort($emails); // Sort by newest email first

    foreach ($emails as $email_number) {
        $structure = imap_fetchstructure($inbox, $email_number);
		//echo "<pre>";
							//print_r($structure);
							//echo "</pre>";
        if (isset($structure->parts)) {
            for ($i = 0; $i < count($structure->parts); $i++) {
                $part = $structure->parts[$i];
				
				

                if ($part->ifdparameters) {
                    foreach ($part->dparameters as $param) {
						
							
                        if (strtolower($param->attribute) == 'filename' && strpos($param->value, '.ics') !== false) {
							
                            $attachment = imap_fetchbody($inbox, $email_number, $i + 1);

                            // Decode attachment if needed
                            if ($part->encoding == 3) { // BASE64
                                $attachment = base64_decode($attachment);
                            } elseif ($part->encoding == 4) { // QUOTED-PRINTABLE
                                $attachment = quoted_printable_decode($attachment);
                            }

                            // Save the file
							
							$filename = 'downloaded_invite'.time().'.ics';
							
                            file_put_contents($filename, $attachment);
                            echo "ICS file downloaded: $filename<br>";
                        }
                    }
                }
            }
        }
    }
} else {
    echo "No emails found.\n";
}

// Close IMAP connection
imap_close($inbox);

?>