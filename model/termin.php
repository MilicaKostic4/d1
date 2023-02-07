<?php

class Termin{

    public $idTermina;
    public $datum;
    public $imeLekara;
    public $nazivSluzbe;

    public function __construct($idTermina=null,$datum=null,$imeLekara=null,$nazivSluzbe=null){

        $this->idTermina = $idTermina;
        $this->datum = $datum;
        $this->imeLekara = $imeLekara;
        $this->nazivSluzbe = $nazivSluzbe;
    }

    public function dodajTermin($connection){
        return $connection->query("INSERT INTO termin(datum,sluzba,lekar) VALUES ('$this->datum','$this->imeLekara','$this->nazivSluzbe')");
    }

    public function izmeniTermin($connection){
        return $connection->query("UPDATE termin SET datum='$this->datum',lekar='$this->imeLekara',sluzba='$this->nazivSluzbe')");
    }

}

?>