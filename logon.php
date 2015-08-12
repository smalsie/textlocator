<div class="form-body">
	<div class="centre-form">
		<?php
		
		
			if(isset($_GET['goto'])) {
			
		?>
		
			<div class="alert alert-success">
			  <button type="button" class="close" data-dismiss="alert">&times;</button>
			  Please sign into your account to continue!
			</div>
		
		<?php
		
		}if(isset($_GET['verifyResent'])) {
			
		?>
		
			<div class="alert alert-success">
			  <button type="button" class="close" data-dismiss="alert">&times;</button>
			  A new verification email has been sent to you.
			</div>
		
		<?php
		
		} else if(isset($_GET['invalidVerify'])) {
			
		?>
		
			<div class="alert alert-warning">
			  <button type="button" class="close" data-dismiss="alert">&times;</button>
			  Invalid verification link, a new verification email has been sent to you.
			</div>
		
		<?php
		
		} else if(isset($_GET['verified'])) {
			
		?>
		
			<div class="alert alert-success">
			  <button type="button" class="close" data-dismiss="alert">&times;</button>
			  Your email address has been verified, you can now login.
			</div>
		
		<?php
		
		} else if(isset($_GET['password_updated'])) {
			
		?>
		
			<div class="alert alert-success">
			  <button type="button" class="close" data-dismiss="alert">&times;</button>
			  Your password has been updated, you can now login.
			</div>
		
		<?php
		
		} else if(isset($_GET['invalidPassReset'])) {
			
		?>
		
			<div class="alert alert-warning">
			  <button type="button" class="close" data-dismiss="alert">&times;</button>
			 Invalid password reset link!
			</div>
		
		<?php
		
		}
		
		?>								
		<?php if($error != "") { ?>
	   
		<div class="alert alert-warning">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<?php echo $error; ?>
	   
		</div>
	   
		<?php } ?>
								
		<form id="log-in-form" role="form" method="post" action="">
			<input type="hidden" name="goto" value="<?php echo $_GET['goto']; ?>" />
			
			<div class="form-group">
				<label for="log-in-email">Email address</label>
				<input type="email" class="form-control" id="log-in-email" name="email" placeholder="Enter email" required>
			</div>
			<div class="form-group bottom-space">
				<label for="log-in-password">Password</label>
				<input type="password" class="form-control" id="log-in-password" name="password" placeholder="Enter Password" required>
			</div>
			<div class="input-group bottom-space">
				<span><input type="checkbox" class="right-space" name="remember_me"> Remember Me </span>
				<a href="pass_reset">Forgot password?</a>
			</div>
			<button type="submit" class="navbar-btn btn-warning btn button-main">Sign In</button>
		</form>
	</div>
</div>


      
