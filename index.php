<?php 
/**
*
* Authors Hugh Tupper and Joshua Small
* Version 25/11/2014
* Index file
* The home screen for the website, allows users to log in
*
*/

//Used to store any errors
$error = "";

//If data has been posted, 
//i.e. the user has submitted on the login form
if($_POST) {
    
    //DB connection
    include 'include/connection.php';
    
    include 'include/functions.php';
    
    //Get the email and sanitise
    $email =sanitised($_POST['email']);
    //Get the password, sanitise and hash
    $password = sanitised($_POST['password']);
    $password = md5($password);
    
    //See if the details are correct by consolting the DB
    $query = mysqli_query($connection, "SELECT * from users where `email` = '$email' AND `password` = '$password'");
    //Get the results
    $row = mysqli_fetch_array($query);
    //No rows returned so must be wrong
    if(mysqli_num_rows($query) != 1)
        $error = "Incorrect login details!";
    else {
        //Correct!
        //The user wants to stay logged in so add a time to the cookie
        if($_POST['remember_me'] == 'on')
            setcookie("User", $row['id'],time()+3600*24*7);
        else
            setcookie("User", $row['id']);
        
        //forward the user to their home            
        header("Location: userHome.php");
    
    }
   
        
}     

?>
<?php include 'include/top-header.php'; /* The top header */?>
<title>LocateMe</title>
<?php include 'include/header.php';  /* The main header (top bar etc) */?>

<div id="header-link" class="anchor-move">
    <div class="header-background">
	    <div class="container">
		    <div class="bottom-space"></div>
		    <div class="row">
			    <div class="col-md-7">
				    <div class="intro-hold">
					    <div id="header-content-hold">
						    <div id="header-content" class="container">
							    <div class="row padding-row">
									    <h1 id="header-welcome-small" class="visible-sm-block visible-xs-block">Welcome To:</h1>
									    <h1 id="header-welcome-large" class="visible-md-block visible-lg-block">Welcome To:</h1>
									    <div id="headerLogoHolder"><img id="headerLogo" src="images/bigLogo.png"/></div>
									    <p id="header-content-intro-small" class="intro-push visible-sm-block visible-xs-block"><b>Look</b> after your mobile devices!<br/> Think your device is <b>lost</b> or <b>stolen?</b><br/> LocateMe will help!<br/>
										    <br/>
										    <br/>
										    <b>Photos:</b> Take photos on your phone<br/>
										    <b>Locate:</b> Locate your device<br/>
										    <b>Password:</b> Lock your device down!<br/>
									    </p>
									    <p id="header-content-intro-large" class="intro-push visible-md-block visible-lg-block"><b>Look</b> after your mobile devices!<br/> Think your device is <b>lost</b> or <b>stolen?</b><br/> LocateMe will help!<br/>
										    <br/>
										    <br/>
										    <b>Photos:</b> Take photos on your phone<br/>
										    <b>Locate:</b> Locate your device<br/>
										    <b>Password:</b> Lock your device down!<br/>
									    </p>
							    </div>
						    </div>
					    </div>
				    </div>
			    </div>
			    <div class="col-md-5">
				    <?php include 'logon.php';  /* Get the login form */?>
			    </div>
		    </div>
	    </div>
	</div>
</div>



<!--Footer Section-->
<?php include 'include/footer.php';  /* Footer */?>
