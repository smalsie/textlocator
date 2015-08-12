<?php include 'include/signed-in-check.php'; ?>
<?php include 'include/top-header.php';?>
<title>LocateMe</title>
<?php include 'include/header.php';?>
<!--Header Section-->


<script>
$(document).ready(function() {    
    //Events that reset and restart the timer animation when the slides change
    $("#transition-timer-carousel").on("slide.bs.carousel", function(event) {
        //The animate class gets removed so that it jumps straight back to 0%
        $(".transition-timer-carousel-progress-bar", this)
            .removeClass("animate").css("width", "0%");
    }).on("slid.bs.carousel", function(event) {
        //The slide transition finished, so re-add the animate class so that
        //the timer bar takes time to fill up
        $(".transition-timer-carousel-progress-bar", this)
            .addClass("animate").css("width", "100%");
    });
    
    //Kick off the initial slide animation when the document is ready
    $(".transition-timer-carousel-progress-bar", "#transition-timer-carousel")
        .css("width", "100%");
});
</script>
<div id="header-link" class="anchor-move">
<div class="header-background">
	<div class="container">
		<div class="bottom-space"></div>
		<div class="row">
			<div id="userHome-info" class="col-md-8">
				<div class="col-md-4">
					<a href="#" class="anchor-change">
						<div class="circle-choice">
							<span class="glyphicon glyphicon-camera logo-icon"></span>
							<h1 class="circle-header">Photo</h1>
						</div>
					</a>
				</div>
				<h1>Take a Photo! </h1> 
				<p>Click the photo icon once again and it will take a photo from your phone.</p>
				<p id="userHome-info1"><br/>Your phone will attempt to connect to your data service or a local free wifi service.<br/>
				If this is achieved a photo will apear here shortly!<br/>
				</p>
			</div>
			<div id="redAlert" class="col-md-3">
				<a href="#" class="anchor-change">
					<div class="circle-alert">
						<span class="glyphicon glyphicon-warning-sign logo-icon-alert green"></span>
						<h1 class="circle-alert-header">Alert</h1>
					</div>
				</a>
				<p>Use the tabs below to help find and shut down your device!</p>
			</div>
		</div>
		<div class="bottom-space"></div>
		<div class="container">
    
    <div id="border-me" class="row">
        <!-- The carousel -->
        <div id="transition-timer-carousel" class="carousel slide transition-timer-carousel" data-ride="carousel">
			<!-- Indicators -->
			<ol class="carousel-indicators">
				<li data-target="#transition-timer-carousel" data-slide-to="0" class="active"></li>
				<li data-target="#transition-timer-carousel" data-slide-to="1"></li>
				<li data-target="#transition-timer-carousel" data-slide-to="2"></li>
			</ol>

			<!-- Wrapper for slides -->
			<div class="carousel-inner">
				<div class="item active">
                    <img src="http://placehold.it/1200x400" />
                    <div class="carousel-caption">
                        <h1 class="carousel-caption-header">Date:</h1>
                        <p class="carousel-caption-text hidden-sm hidden-xs">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse dignissim aliquet rutrum. Praesent vitae ante in nisi condimentum egestas. Aliquam.
                        </p>
                    </div>
                </div>
                
                <div class="item">
                    <img src="http://placehold.it/1200x400/AAAAAA/888888" />
                    <div class="carousel-caption">
                        <h1 class="carousel-caption-header">Date:</h1>
                        <p class="carousel-caption-text hidden-sm hidden-xs">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse dignissim aliquet rutrum. Praesent vitae ante in nisi condimentum egestas. Aliquam.
                        </p>
                    </div>
                </div>
                
                <div class="item">
                    <img src="http://placehold.it/1200x400/888888/555555" />
                    <div class="carousel-caption">
                        <h1 class="carousel-caption-header">Date:</h1>
                        <p class="carousel-caption-text hidden-sm hidden-xs">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse dignissim aliquet rutrum. Praesent vitae ante in nisi condimentum egestas. Aliquam.
                        </p>
                    </div>
                </div>
            </div>

			<!-- Controls -->
			<a class="left carousel-control" href="#transition-timer-carousel" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left"></span>
			</a>
			<a class="right carousel-control" href="#transition-timer-carousel"  data-slide="next">
				<span class="glyphicon glyphicon-chevron-right"></span>
			</a>
            
            <!-- Timer "progress bar" -->
            <hr class="transition-timer-carousel-progress-bar animate" />
		</div>
    </div>
</div>
</div>
	</div>
	</div>
</div>



<!--Footer Section-->
<?php include 'include/footer.php';?>
