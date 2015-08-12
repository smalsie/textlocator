<?php
    
    define("HP_URL", "https://designer.hpwallart.com/amansoni?web_link=true");
    
	if(!isset($_COOKIE["User"]))
		header("Location:index.php");
/*		
    function admin_check() {
        
        include 'connection.php';
        
        $UserID = $_COOKIE["User"];
    
        $query = mysqli_query($connection,"Select * from `users` where `id` = '$UserID' AND `admin` = '1'");
    
        if(mysqli_num_rows($query) !=1)
            header("Location: ./");
    
    }
    
    function isAdmin() {
    
    	include 'connection.php';
        
        $UserID = $_COOKIE["User"];
    
        $query = mysqli_query($connection,"Select * from `users` where `id` = '$UserID' AND `admin` = '1'");
    
        return mysqli_num_rows($query) == 1;
    	
    
    }
*/
?>
