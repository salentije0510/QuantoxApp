<?php
/**
 * Created by PhpStorm.
 * User: sasa.popovic
 * Date: 10/17/2018
 * Time: 4:02 PM
 */
$serverName = 'localhost';
$username = 'root';
$password = '';
$dbName = 'testapp';

$conn = mysqli_connect($serverName, $username, $password, $dbName);

if(!$conn){
	echo 'Connection Error ' . mysqli_connect_error();
}