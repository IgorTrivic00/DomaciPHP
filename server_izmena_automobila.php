<?php
require 'dbBroker.php';
require "models/automobil.php";

$automobil = trim($_POST['automobil']);
$cena = trim($_POST['cena']);

if(Automobil::izmeniAutomobil($automobil , $cena, $konekcija)){
    echo "Uspesno izmenjena cena iznajmljivanja";
}else{
    echo "Doslo je do greske";
}
?>
