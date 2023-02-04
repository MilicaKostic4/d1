<?php

class Korisnik{
    public $id;
    public $username;
    public $password;

    public function __construct($id=null, $username=null, $password=null)
    {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
    }

    public static function loginUser($usr, mysqli $connection){
        $query = "SELECT * FROM korisnik WHERE username='$usr->username' and password='$usr->password'";
        return $connection->query($query);
    }
}

?>