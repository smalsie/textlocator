<?php include 'include/signed-in-check.php'; ?>
<?php include 'include/top-header.php';?>
<title>LocateMe</title>
<?php include 'include/header.php';?>
<!--Header Section-->
<script src="js/quick-quote-calc.js"></script>
<div id="header-link" class="anchor-move">
<div class="header-background">
	<div class="container">
		<div class="bottom-space"></div>
		<div class="row">
			<div id="userHome-info" class="col-md-8">
				<h1>Is your phone either lost or stolen? </h1> 
				<p>Use the tabs below to help find and shut down your device!</p>
				<p id="userHome-info1"><b><br/>Photo</b> - use your phones camera to take a pictures of the person with the device<br/>
				<b>Locate</b> - obtain the location coordinates of your device<br/>
				<b>Password</b> - change the password on your device
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
		<div class="row">
			<div id="circle-hold" class="col-md-7">
				<div class="col-md-4">
					<a href="#" class="anchor-change">
						<div class="circle-choice">
							<span class="glyphicon glyphicon-camera logo-icon"></span>
							<h1 class="circle-header">Photo</h1>
						</div>
					</a>
				</div>
				<div class="col-md-4">
					<a href="userLocate" class="anchor-change">
						<div class="circle-choice">
							<span class="glyphicon glyphicon-map-marker logo-icon"></span>
							<h1 class="circle-header">Locate</h1>
						</div>
					</a>
				</div>
				<div class="col-md-4">
					<a href="#" class="anchor-change">
						<div class="circle-choice">
							<span class="glyphicon glyphicon-lock logo-icon"></span>
							<h1 class="circle-header">Password</h1>
						</div>
					</a>
				</div>
			</div>

		</div>
	</div>
	</div>
</div>



<!--Footer Section-->
<?php include 'include/footer.php';?>
