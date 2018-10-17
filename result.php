<?php
/**
 * Created by PhpStorm.
 * User: sasa.popovic
 * Date: 10/17/2018
 * Time: 3:56 PM
 */
include_once('dbConnect.php');
session_start();
if (isset($_SESSION['searchresult'])){
	$result =  $_SESSION['searchresult'];
}
?>

<html>
<head>
    <title>PHP Login & Register</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
<ul>
	<?php
	foreach( $result as $user): ?>
		<li><?= $city ?>
		</li>
	<?php endforeach; ?>
</ul>
</div>
</body>
</html>
