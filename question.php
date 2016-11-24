<?php
header('Content-type: text/plain; charset=utf-8');
// Send variables for the MySQL database class.
$link = mysql_connect('localhost', 'sola_voznje', 'sola_voznje') or die('Could not connect: ' . mysql_error());
mysql_select_db('sola_voznje') or die('Could not select database');

$kviz = mysql_real_escape_string($_GET['kviz'], $link);
$email = mysql_real_escape_string($_GET['email'], $link);
/*$query = "SELECT * FROM `vprasanje` WHERE tip_vprasanja=("
        . "SELECT id FROM tip_vprasanja WHERE tip='$kviz')"
        . "ORDER BY RAND() LIMIT 1";*/
$query = "SELECT v.vprasanje, v.odgovor, v.pravilni_odgovor "
        . "FROM uporabnik u INNER JOIN kategorija k ON k.id=u.kategorija_id "
        . "INNER JOIN kategorija_vp kvp ON k.id=kvp.kategorija_id "
        . "INNER JOIN vprasanje v ON v.id=kvp.vprasanje_id "
        . "WHERE (u.email='$email') AND (v.tip_vprasanja=(SELECT id FROM tip_vprasanja WHERE tip='$kviz'))"
        . "ORDER BY RAND() LIMIT 1";

$result = mysql_query($query) or die('Query failed: ' . mysql_error());

$num_results = mysql_num_rows($result);
if ( $num_results== 1) {
    $row = mysql_fetch_array($result);
   // echo $row['odgovor']."\n";
    $odg=$row['vprasanje'] ."*".$row['odgovor']."*".$row['pravilni_odgovor']."*";
    $odg = iconv('windows-1250', 'utf-8', $odg);
    for($x=0;$x<strlen($odg);$x++){
        if($odg[$x]=='?'&&$odg[$x+1]!='*'){
            //$odg[$x]='č';
            echo 'č';
        }else{
            echo $odg[$x];
        }
    }
    //echo $odg;
}else{
    echo 'Neobstaja!';
}
?>