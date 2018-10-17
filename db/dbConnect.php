<?php
/**
 * Created by PhpStorm.
 * User: sasa.popovic
 * Date: 10/17/2018
 * Time: 3:13 PM
 */
DEFINE ('DB_USER', 'testUser');

DEFINE ('DB_PASSWORD', 'Test123!');

DEFINE ('DB_HOST', 'localhost');

DEFINE ('DB_NAME', 'test');

$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
OR die('Could not connect to MySQL: ' .
mysqli_connect_error());

?>