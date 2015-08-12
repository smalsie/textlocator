<?php
/**
*
* Authors Hugh Tupper and Joshua Small
* Version 25/11/2014
* Logout file
* Used to log the user out
*
*/
//Delete the cookie
if(isset($_COOKIE['User']))
	setcookie("User", "", time()-1);

//Send them to the home page	
header("Location: index.php");

?>
