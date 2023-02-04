<?php

$host = "localhost";
$database = "domzdravlja";
$user = "root";
$pass = "";

$connection = new mysqli($host, $user, $pass, $database);

if($connection->connect_errno){
    exit("Nije moguce uspostaviti konekciju. Greska: ".$connection->connect_error);
}

?>