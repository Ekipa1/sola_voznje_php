<?php

// Send variables for the MySQL database class.
$link = mysql_connect('localhost', 'sola_voznje', 'sola_voznje') or die('Could not connect: ' . mysql_error());
mysql_select_db('sola_voznje') or die('Could not select database');

$email = mysql_real_escape_string($_GET['email'], $link);
$geslo = mysql_real_escape_string($_GET['geslo'], $link);
$geslo = sha1($geslo);
$query = "SELECT * FROM `uporabnik` WHERE email='$email' AND geslo='$geslo'";
$result = mysql_query($query) or die('Query failed: ' . mysql_error());

$num_results = mysql_num_rows($result);
if ( $num_results== 1) {
    $row = mysql_fetch_array($result);
    echo $row['email'] ."\n";
}else{
    echo 'Neobstaja!';
}
?>