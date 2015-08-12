<?php
	
	$db_host = "localhost"; 
	// Place the username for the MySQL database here 
	$db_username = "mywall_mysql";  
	// Place the password for the MySQL database here 
	$db_pass = "MyWa11!1846";  
	// Place the name for the MySQL database here 
	$db_name = 'InfoSec'; 

	// Run the actual connection here  
	$connection = mysqli_connect("$db_host","$db_username","$db_pass", "$db_name") or die ("Unable to connect to mysql");   

?>
