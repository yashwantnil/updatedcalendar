# updatedcalendar

Go to your php.ini and search for 
;extension=imap and uncomment or replace so it will look like extension=imap 
In bluehost add all files which are present in updatedcalendar folder
Save php.ini and restart your server i.e. xampp/apache. 
In mysql run testcalendar.sql file so it will create database as well as required tables

You have to execute below files in sequence
1. icsnew.php // Download icloud Calendar file
2. icsdb.php // Insert icloud calendar details to events table
3. ics.php // Download ics file
4. icaldb.php // Insert ics file calendar details to events table
5. index.php // Which will show calendar with all invites

   If need any help contact me.
