<?php
/**
 * Created by PhpStorm.
 * User: sasa.popovic
 * Date: 10/17/2018
 * Time: 3:51 PM
 */
namespace App;
session_start();
if(!isset($_SESSION['username'])){
	header('location:index.php');
}
?>

<html>
<head>
	<title>Login and Register</title>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
<div class="container">
	<a href="logout.php">Logout</a>
	<div style="width: 500px; margin: 50px auto;">
		<h3>Welcome <?php echo $_SESSION['username']; ?></h3
	</div>
</div>
</body>
</html>