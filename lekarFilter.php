<?php

include "connect.php";

if(!empty($_POST["id"])){
    $vratiLekare = "SELECT * FROM sluzba s JOIN lekar l ON (s.naziv=l.sluzba) WHERE s.id=".$_POST['id']."";
    $lekari = $connection->query($vratiLekare);
}

if($lekari->num_rows>0){
    echo '<option value="">Izaberi</option>';
    while ($lekar = $lekari->fetch_array()) :
        echo '<option value="'.$lekar['ime'].'">'.$lekar['ime'].'</option>';
    endwhile;
}
else{
    echo '<option value="">Nema lekara</option>';
}

?>