<?php

require "../connect.php";
require "../model/termin.php";

$nazivSl = $connection->query("SELECT naziv FROM sluzba WHERE id=".$_POST["sluzba"]."");
$sluzbaNaziv = mysqli_fetch_array($nazivSl)[0];

if(isset($_POST["idT"]) && isset($_POST["datum"]) && isset($_POST["sluzba"]) && isset($_POST["lekar"])){
    
    if($_POST["lekar"]=="" || $_POST["lekar"]=="none"){
        echo "Neuspesno";
    }else{
        $termin = new Termin($_POST["idT"],$_POST["datum"],$_POST["lekar"], $sluzbaNaziv);
        $status = $termin->izmeniTermin($connection);
        if($status){
            echo "Uspesno";
        }
        else{
            echo "Neuspesno";
        }
    }

}


?>