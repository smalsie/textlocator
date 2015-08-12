<?php
/**
*
* Authers Hugh Tupper and Joshua Small
* Version 25/11/2014
* Check verified file
* This file will only evet be called via javascript at a set interval to check if 
* a new has replied to the server letting us know that it has a real phone number.
* When the server recieves a message from a new phone it sets that users row to
* verified so if it is set to 1 we know that the phone is verified
*
*/
//DB connection
include 'include/connection.php';
//The users ID
$id = $_POST['id'];

//find out if the user has been verified
$query = mysqli_query($connection, "Select * from `users` where `id` = '$id'");
$row = mysqli_fetch_array($query);

//if verified echo out alerting the executing JS
if($row['verified'] == 1)
	echo "Verified!";
