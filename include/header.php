<!-- JQuery and Bootstrap -->
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

<!-- Whats this? -->
<script src="js/smooth-scrolling.js"></script>

</head>

<body>

<!-- The top navigation bar -->
<div id="navBar" class="navbar navbar-inverse navbar-fixed-top">
	
	<!-- Container for the links -->
    <div class="container">
	
	    <?php if(isset($_COOKIE['User'])) { ?>
		   <a href="userHome.php" class="navbar-brand">
	    <?php } else { ?>	
	        <a href="./" class="navbar-brand">
	     <?php } ?>
	     
	            <img id="navLogo" src="images/smallLogo.png"/>
	     
	        </a>
	
	    <!-- Dropdown button for when viewing on mobile -->
	    <button class="navbar-toggle" data-toggle="collapse" data-target=".navHeaderCollapse">
		    <span class = "icon-bar"></span>
		    <span class = "icon-bar"></span>
		    <span class = "icon-bar"></span>
	    </button>
	
	    <!-- Links -->
	    <div class="collapse navbar-collapse navHeaderCollapse">
		    <div class="navspy">
			    <ul class="nav navbar-nav navbar-left">
			        <!-- Signed In -->
			        <?php if(isset($_COOKIE['User'])) { ?>
				        <li><a href="userHome.php">Home</a></li>
			        <!-- Not Signed In -->
			        <?php } else { ?>	
			            <li><a href="./#header-link">Home</a></li>
			         <?php } ?>				
			    </ul>
		    </div>
		    <!-- Links on the left -->
		    <ul style="margin-top:5px;" class="nav nav-pills navbar-right">
		        <!-- Signed In -->
		        <?php if(isset($_COOKIE['User'])) { ?>
		            <li><a href="logout.php"> Log out</a></li>
		        <!-- Not Signed In -->
		        <?php } else { ?>
		            <li><a href="register.php">Register</a></li>
		        <?php } ?>
		    </ul>
		
	    </div><!-- End of nav bar -->
	
    </div><!-- End of container -->

</div><!-- End of top head bar -->

<!-- TUPPS -->
<div id="nav-push"></div>
