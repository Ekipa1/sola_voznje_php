<?php
// Send variables for the MySQL database class.
$link = mysql_connect('localhost', 'sola_voznje', 'sola_voznje') or die('Could not connect: ' . mysql_error());
mysql_select_db('sola_voznje') or die('Could not select database');

$email = mysql_real_escape_string($_GET['email'], $link);
/*$query = "SELECT * FROM `vprasanje` WHERE tip_vprasanja=("
        . "SELECT id FROM tip_vprasanja WHERE tip='$kviz')"
        . "ORDER BY RAND() LIMIT 1";*/
$query2 = "SELECT tocke FROM uporabnik WHERE email='$email'";

$result2 = mysql_query($query2) or die('Query failed: ' . mysql_error());

$num_results = mysql_num_rows($result2);
$row = mysql_fetch_array($result2);
$odg=$row['tocke'];
$int = (int)$odg;
$int++;
$query = "UPDATE uporabnik SET tocke='$int' WHERE email='$email'";

$result = mysql_query($query) or die('Query failed: ' . mysql_error());


?>