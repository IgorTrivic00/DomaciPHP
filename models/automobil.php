<?php
class Automobil{

    public $automobilID;
    public $naziv;
    public $proizvodjacID;
    public $motor;
    public $prenos;
    public $tipID;
    public $cena; 
    public function __construct($automobilID=null, $naziv=null, $proizvodjacID=null,$motor=null, $prenos=null, $tipID=null , $cena=null)
    {
        $this->automobilID = $automobilID;
        $this->naziv=$naziv;
        $this->proizvodjacID=$proizvodjacID;
        $this->motor=$motor;
        $this->prenos=$prenos;
        $this->tipID=$tipID;
        $this->cena=$cena; 
    }

    public static function pretraziAutomobile($proizvodjac, $sort, mysqli $konekcija)
    {
        $sql = "SELECT * FROM automobil a join tip t on a.tipID = t.tipID join proizvodjac p on a.proizvodjacID = p.proizvodjacID";
        
        if($proizvodjac != "0"){
            $sql .= " WHERE a.proizvodjacID = " . $proizvodjac;
        }
        $sql.= " ORDER BY a.cena " . $sort;


        $resultSet = $konekcija->query($sql);
        $rezultati = [];
        while($red = $resultSet->fetch_object()){
            $rezultati[] = $red;
        }
        return $rezultati;
    }

    
    public static function vratiAutomobile(mysqli $konekcija)
    {
        $sql = "SELECT * FROM automobil a join tip t on a.tipID = t.tipID join proizvodjac p on a.proizvodjacID = p.proizvodjacID";
        $resultSet = $konekcija->query($sql);

        $rezultati = [];
        while($red = $resultSet->fetch_object()){
            $rezultati[] = $red;
        }
        return $rezultati;
    }


    public static function unesiAutomobil($naziv, $proizvodjac, $motor, $prenos, $tip, $cena, mysqli $konekcija)
    {
        return $konekcija->query("INSERT INTO automobil VALUES(null, '$naziv' , '$proizvodjac', '$motor' , '$prenos', '$tip', '$cena' )");  
    }

    public static function izmeniAutomobil($automobilID, $cena, mysqli $konekcija)
    {
        return $konekcija->query("UPDATE automobil SET cena = '$cena' WHERE automobilID = $automobilID");
    }

    public static function obrisiAutomobil($automobilID, mysqli $konekcija)
    {
        return $konekcija->query("DELETE FROM automobil WHERE automobilID = $automobilID");
    }
  




}
?>