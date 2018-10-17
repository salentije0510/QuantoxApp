<?php
include_once('dbConnect.php');

$error = false;
if(isset($_POST['btn-register'])){
	//clean user input to prevent sql injection
	$username = $_POST['username'];
	$username = strip_tags($username);
	$username = htmlspecialchars($username);
	
	$email = $_POST['email'];
	$email = strip_tags($email);
	$email = htmlspecialchars($email);
	
	$password = $_POST['password'];
	$password = strip_tags($password);
	$password = htmlspecialchars($password);
	
	$password2 = $_POST['password2'];
	$password2 = strip_tags($password2);
	$password2 = htmlspecialchars($password2);
	
	//validate
	if(empty($username)){
		$error = true;
		$errorUsername = 'Username field is empty. Please insert a valid username';
	}
	
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		$error = true;
		$errorEmail = 'Email field is empty. Please insert a valid email';
	}
	
	if (empty($password2)){
	    $error = true;
	    $errorPassword2 = 'Repeat password field is empty. Please retype your password';
    }
    
	if(empty($password)){
		$error = true;
		$errorPassword = 'Password field is empty. Please insert your password';
	}elseif(strlen($password) < 6){
		$error = true;
		$errorPassword = 'Password must have at least 6 characters';
	}elseif ($password == $password2){
		$error = true;
		$errorPassword = 'Passwords do not match. Please insert correct passwords';
    }
	
	//encrypt password with md5
	$password = md5($password);
	
	//insert data if no error
	if(!$error){
		$sql = "insert into tbl_users(username, email ,password)
                values('$username', '$email', '$password')";
		if(mysqli_query($conn, $sql)){
			$successMsg = 'Register successfully. <a href="login.php">click here to login</a>';
		}else{
			echo 'Error ' . mysqli_error($conn);
		}
	}
	
}

?>

<html>
<head>
    <title>PHP Login & Register</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div style="width: 500px; margin: 50px auto;">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
            <center><h2>Register</h2></center>
            <hr/>
			<?php
			if(isset($successMsg)){
				?>
                <div class="alert alert-success">
                    <span class="glyphicon glyphicon-info-sign"></span>
					<?php echo $successMsg; ?>
                </div>
				<?php
			}
			?>
            <div class="form-group">
                <label for="username" class="control-label">Username</label>
                <input type="text" name="username" class="form-control">
                <span class="text-danger"><?php if(isset($errorUsername)) echo $errorUsername; ?></span>
            </div>
            <div class="form-group">
                <label for="email" class="control-label">Email</label>
                <input type="email" name="email" class="form-control" autocomplete="off">
                <span class="text-danger"><?php if(isset($errorEmail)) echo $errorEmail; ?></span>
            </div>
            <div class="form-group">
                <label for="password" class="control-label">Password</label>
                <input type="password" name="password" class="form-control" autocomplete="off">
                <span class="text-danger"><?php if(isset($errorPassword)) echo $errorPassword; ?></span>
            </div>
            <div class="form-group">
                <label for="password" class="control-label">Password</label>
                <input type="password" name="password" class="form-control" autocomplete="off">
                <span class="text-danger"><?php if(isset($errorPassword)) echo $errorPassword; ?></span>
            </div>
            <div class="form-group">
                <center><input type="submit" name="btn-register" value="Login" class="btn btn-primary"></center>
            </div>
            <hr/>
            <a href="login.php">Login</a>
        </form>
    </div>
</div>
</body>
</html>