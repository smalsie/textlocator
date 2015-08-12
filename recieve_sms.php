<?php 
/**
*
* Authors Hugh Tupper and Joshua Small
* Version 25/11/2014
* Recieve SMS file
* File that all text data is sent to when 
* the server recieves a text message
*
*/

//DB connection
include 'include/connection.php';

//The phone number the text was sent from
$from = $_POST['From'];
//Find out which user sent the text
$query = mysqli_query($connection, "Select `id` from `users` where `number` = '$from'");
$row = mysqli_fetch_array($query);
$userid = $row['id'];

//The message from the text
$message = $_POST['Body'];
//The current time in YYYY-MM-DD HH:MM:SS
$time = date("Y-m-d H:i:s");

//Split the message into words
$pieces = explode(" ", $message);

//If the first word is Location we have been sent a new location
if($pieces[0] == "Location") {

	//get the latitude, longitude and accuracy
	$lat = $pieces[2];
	$lng = $pieces[4];
	$accuracy = $pieces[6];
    
    //Insert the new location
	mysqli_query($connection, "Insert into `location` (`userid`, `lat`, `lng`, `accuracy`, `time`) VALUES('$userid', '$lat', '$lng', '$accuracy', '$time')");


} else if($pieces[0] == "Verify") {

    //We need to verify a number so update the users row
	mysqli_query($connection, "Update `users` set `verified` = '1' where `id` = '$userid'");

}
 

?>
