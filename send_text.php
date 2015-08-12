<?php
/**
*
* Authors Hugh Tupper and Joshua Small
* Version 25/11/2014
* Send Text file
* File used to send a text message to a user
*
*/

//We need the Twilo libs for this
require 'twillo/Services/Twilio.php';
//DB connection
include 'include/connection.php';

if($_POST) {
	//If posting get the user_id and keyword
	$id = $_POST["id"];
	$keyword = $_POST['keyword'];
	
} else {
    //else its the logged in used and the default keyword of Bannanas
	$id = $_COOKIE['User'];
	$keyword = "Bananas"; /* Tells the phone to send back its location */

}

//Find out the users name and number
$query = mysqli_query($connection, "Select * from `users` where `id` = '$id'");	
$row = mysqli_fetch_array($query);
$number = $row['number'];
$name = $row['name'];

//Set our AccountSid and AuthToken from www.twilio.com/user/account
$sid = 'AC96ef4e77765cb66bdbde905f8441bfaf';
$token = '81f28202e6f94abd85eb35a089e195ef';

//Instantiate a new Twilio Rest Client
$client = new Services_Twilio($sid, $token);

//Our Twilo PhoneNumber
$phonenumber = '441603914088';

//Send the text with a normalish looking message
$sms = $client->account->messages->sendMessage($phonenumber, $number,"Hey $name, Monkey Party at 6PM. Bring $keyword!");
