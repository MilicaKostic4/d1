<?php

require "../connect.php";

if(!empty($_POST["id"])){
    if($connection->query("DELETE FROM termin WHERE id=".$_POST['id']."")){
        echo "Uspesno";
    }
    else{
        echo "Neuspesno";
    }
}

?>