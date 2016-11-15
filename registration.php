<?php 
        $link = mysql_connect('localhost', 'sola_voznje', 'sola_voznje') or die('Could not connect: ' . mysql_error()); 
        mysql_select_db('sola_voznje') or die('Could not select database');
        //include './db.php';
        // Strings must be escaped to prevent SQL injection attack. 
        $kat = mysql_real_escape_string($_GET['kat'], $link); 
        $ui = mysql_real_escape_string($_GET['ui'], $link);
        $geslo = mysql_real_escape_string($_GET['geslo'], $link); 
        $email = mysql_real_escape_string($_GET['email'], $link);
        $datum_roj = mysql_real_escape_string($_GET['datum'], $link);
        //$hash = $_GET['hash']; 
        $phpdate = strtotime( $datum_roj );
        $datum_roj=date('Y-m-d H:i:s',$phpdate);
        //$secretKey="11spaceinvader23"; # Change this value to match the value stored in the client javascript below 

       // $real_hash = md5($name . $score . $secretKey); 
       // if($real_hash == $hash) { 
            // Send variables for the MySQL database class. 
            $query = "INSERT INTO uporabnik (kategorija_id, uporabnisko_ime, geslo, email, datum_rojstva, tocke) "
                    . "VALUES ((SELECT id FROM kategorija WHERE ime='$kat'), '$ui', '$geslo', '$email', '$datum_roj', 0);"; 
            $result = mysql_query($query) or die('Query failed: ' . mysql_error()); 
       // } 
?>