<?php

require "../connect.php";
require "../model/termin.php";

$nazivSl = $connection->query("SELECT naziv FROM sluzba WHERE id=".$_POST["sluzba"]."");
$sluzbaNaziv = mysqli_fetch_array($nazivSl)[0];

if(isset($_POST["datum"]) && isset($_POST["sluzba"]) && isset($_POST["lekar"])){
    if($_POST["lekar"]=="none"){
        echo "Neuspesno";
    }else{
        $termin = new Termin(null,$_POST["datum"],$sluzbaNaziv,$_POST["lekar"]);
        $status = $termin->dodajTermin($connection);
        if($status){
            echo "Uspesno";
        }
        else{
            echo "Neuspesno";
        }
    }

}

?>