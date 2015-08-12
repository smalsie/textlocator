<?php

    $error = "";

    if($_POST) {

        include 'include/functions.php';
        include 'include/connection.php';
            
        $name = sanitised($_POST['name']);
        $email = sanitised($_POST['email']);
        $number = sanitised($_POST['number']);
        $password = sanitised($_POST['password']);
        $confirmPassword = sanitised($_POST['confirmPassword']);
        
        //incase if JS is disabled, html5 does a decent job thankfully :)
        if($password != $confirmPassword)
            $error = "Passwords don't match!";
       else {
        
        	$password = md5($password); 
        
            mysqli_query($connection, "Insert into `users` (`email`, `password`, `number`, `name`) VALUES('$email', '$password', '$number', '$name')");
            
            $id = mysqli_insert_id($connection);
            
            setcookie("User", $id);
            
            header("Location: verify_phone.php");
            
            die;
        
        }
        
        
            
    } 

    include 'include/top-header.php';

?>

<title>My Wall - Register</title>

<?php
include 'include/header.php';
    
?>


<div class="background">
	<div class="container">
				
		<div class="bottom-space"></div>
		<div class="row">
			<div class="col-md-5">
				<div class="log-logo-hold centre-x">
					<a href="./"><img class="log-logo" src="images/smallLogo.png"/></a>
					<h1 class="text-center text-header">Register</h1>
				</div>
			</div>
			<div class="col-md-7">
				<div class="form-body">
					<div class="centre-form">
					    
					    <?php
						
							if(isset($_GET['registered'])) {
							
						?>
						
							<div class="alert alert-success">
							  <button type="button" class="close" data-dismiss="alert">&times;</button>
							  You have successfully registered, please check your email to verify your account.
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
                        
						<form id="register-form" role="form" method="post" action="">
							<div class="form-group">
								<label for="first_name">Name</label>
								<input type="text" class="form-control" id="name" name="name" placeholder="Name" value="<?php echo $name; ?>" autofocus required>
							</div>
							
							<div class="form-group">
								<label for="email">Email address</label>
								<input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $email; ?>" autofocus required>
							</div>
							
							<div class="form-group">
								<label for="email">Phone Number</label>
								<input type="text" class="form-control" id="number" name="number" placeholder="Number" value="<?php echo $number; ?>" autofocus required>
							</div>
							
							<div class="form-group">
								<label for="password">Password</label>
								<input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
							</div>
							<div class="form-group">
								<label for="confirmPassword">Confirm Password</label>
								<input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" required>
								<label class="error" id="nonMatchPassword">Passwords don't match!</label>
							</div>
							<button type="submit" class="navbar-btn btn-warning btn button-main">Register</button>
						</form>						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>



<?php
    
    include 'include/footer.php';
    
?>
      
