<?php
/**
 * Created by PhpStorm.
 * User: sasa.popovic
 * Date: 10/17/2018
 * Time: 3:51 PM
 */
session_start();
include_once('dbConnect.php');

$error = false;
if(isset($_POST['btn-search'])){
	$email = trim($_POST['email']);
	$email = htmlspecialchars(strip_tags($email));
	
	if(!isset($_SESSION['username'])){
		$error = true;
		$errorUser = 'In order to search for specified user login is required';
	}elseif(empty($email)){
		$error = true;
		$errorUser = 'Please insert an email';
	}elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		$error = true;
		$errorUser = 'Please insert a valid email address';
	}
	
	if(!$error){
		$sql = "select * from tbl_users where email='$email' or username='$email' ";
		$result = mysqli_query($conn, $sql);
		$users = [];
		if($result){
			while($row = $result->fetch_array())
			{
				$users[] = $row;
			}
			$_SESSION['searchresult'] = $users;
			header('location: result.php');
		}else{
			$errorMsg = 'There is no user with that username or an email address.';
		}
	}
}
?>

<html>
<head>
    <title>Homepage</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div style="width: 500px; margin: 50px auto;">
        <a href="login.php">Login</a>
        <a href="register.php">Register</a>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
            <h2>Search user</h2>
            <hr/>
			<?php
			if(isset($errorMsg)){
				?>
                <div class="alert alert-danger">
                    <span class="glyphicon glyphicon-info-sign"></span>
					<?php echo $errorMsg; ?>
                </div>
				<?php
			}
			?>
            <div class="form-group">
                <label for="user" class="control-label">User</label>
                <input type="user" name="user" class="form-control" autocomplete="off">
                <span class="text-danger"><?php if(isset($errorUser)) echo $errorUser; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" name="btn-search" value="Search" class="btn btn-primary">
            </div>
            <hr/>
        </form>
    </div>
</div>
</body>
</html>