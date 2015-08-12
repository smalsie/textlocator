<?php
/**
*
* Authors Hugh Tupper and Joshua Small
* Version 25/11/2014
* Check new location file
* This file will only ever be called via JavaScript at a set interval to check if 
* a new location has been sent to the server.
*
*/

//DB connection
include 'include/connection.php';

//Row ID
$id = 0;

//If its been posted set it otherwise its a new phone so 0 will do.
if(isset($_POST['id'])) 
	$id = $_POST['id'];

//get the current logged in users ID
$userid = $_POST['userid'];

//Get any locations that are newer than the current one and belong to the user, should only be 1 at most
$query = mysqli_query($connection, "Select * from `location` where `id` > '$id' AND `userid` = '$userid'");

//If there is a new location
if(mysqli_num_rows($query) != 0) {
    
    //get the results
	$row = mysqli_fetch_array($query);

    //echo out the results to be interpreted by the executing JS
	echo "id: " . $row['id'] . " lat: " . $row['lat'] . " lng: " . $row['lng'] . " accuracy: " . $row['accuracy'] . " time: " . date("l jS F  Y", strtotime ($row['time'])) . " at ". date("G:i", strtotime ($row['time']));
		
}
