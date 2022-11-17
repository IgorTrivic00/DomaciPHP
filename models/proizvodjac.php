<?php

class Proizvodjac{

    public $proizvodjacID;
    public $nazivProizvodjaca;
    public $drzava;

    public function __construct($proizvodjacID=null,$nazivProizvodjaca=null,$drzava=null)
    {
        $this->proizvodjacID = $proizvodjacID;
        $this->nazivProizvodjaca = $nazivProizvodjaca;
        $this->drzava = $drzava;
    }

    public static function vratiProizvodjace(mysqli $konekcija)
    {
        $sql = "SELECT * FROM proizvodjac";
        $resultSet = $konekcija->query($sql);

        $rezultati = [];
        while($red = $resultSet->fetch_object()){
            $rezultati[] = $red;
        }
        return $rezultati;
    }
}


?>