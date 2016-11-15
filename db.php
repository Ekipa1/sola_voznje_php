<?php
$username = 'sola_voznje';
$password = 'sola_voznje';
$server = 'localhost';
$db_name = 'sola_voznje';
//povezali na bazo
$link = mysqli_connect($server, $username, $password) or die('Could not connect: ' . mysql_error()); 
//težava s šumniki
mysql_select_db($db_name) or die('Could not select database');
//mysqli_query($link,"SET NAMES 'utf8'");
?>