<?php
/**
*
* Authors Hugh Tupper and Joshua Small
* Version 25/11/2014
* locateOverlay file
* The overlay used whenever the user is accessing their location
*
*/

?>
<!-- The Overlay -->
<div id="loadingOverlay" class="container">
	<div class="overlay">
		<div id="overlay-hold" class="centered"></div>
		<img id="loader-small" class="centered" src="images/loader.gif" alt="Loading..."/>
		<img id="loading-image-small" class="centered" src="images/loading-screen.png" alt="Loading..."/>
		<h1 class="centered-top-small"> Your phone is being Located </h1>
    </div>
</div>

<?php

if($locate) { /* If its the first ever time */?>

    <script>
	    /*
	    * Its the first time so we show the overlay
	    * and then send out a text to get the location
	    */
	    var userid = <?php echo $userid; ?>;
	    $("#loadingOverlay").show();
	    sendText(true);

    </script>

<?php } ?>
