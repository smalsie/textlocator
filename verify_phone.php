<?php
/**
*
* Authors Hugh Tupper and Joshua Small
* Version 25/11/2014
* Index file
* The home screen for the website, allows users to log in
*
*/

include 'include/signed-in-check.php';

include 'include/connection.php';

$id = $_COOKIE["User"];
$query = mysqli_query($connection, "Select * from `users` where `id` = '$id'");	
$row = mysqli_fetch_array($query);

$number = $row['number'];

include 'include/top-header.php';?>

<title>LocateMe</title>

</head>

<body data-spy="scroll" data-target=".navspy" data-offset="120">
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="js/smooth-scrolling.js"></script>


<script type="text/javascript">

    //The data to post to send_text.php
    //Oranges tells the phone to verify itself
    var formData = {id:"<?php echo $id; ?>", keyword: "Oranges"};  
    //Interval used to keep looping the check for the response
    var interval;

    //First AJAX call is to send out the text
    $.ajax({
        url : "send_text.php",
        type: "POST",
        data : formData,
        success: function(data, textStatus, jqXHR)
        {
            //When the text has been sent, start looking 
            //out for a response every 5 seconds
            interval = setInterval(function() {
		      checkVerified()
		    }, 1000 * 5); 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert("Sorry, something wen't wrong, please try again");
        }
    });

    //Used to check if a verification text has been sent back
    function checkVerified() {
    
        //The users id to send through
	    var formData = {id:"<?php echo $id; ?>"}; 
     
        $.ajax({
            url : "check_verified.php",
            type: "POST",
            data : formData,
            success: function(data, textStatus, jqXHR)
            {
                //if we get a response it has been verified
                if(data != "") {
                	clearInterval(interval);
                	//Move the user onto their home page
                	window.location = "userHome.php?verified";
            	}
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert("Sorry, something wen't wrong, please try again");         
            }
            
        });

    }

</script>

<!-- Loading area -->
<div class="container">
	<img id="loader" class="centered" src="images/loader.gif" alt="Loading..."/>
	<img id="loading-image" class="centered" src="images/loading-screen.png" alt="Loading..."/>
	<h1 class="centered-top"> Your phone is being verified </h1>
</div>

</body>

</html>
