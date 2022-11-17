<?php
require 'dbBroker.php';
require "models/automobil.php";

$automobil = trim($_POST['automobil']);

if(Automobil::obrisiAutomobil($automobil, $konekcija)){
    echo "Uspesno brisanje automobila";
}else{
    echo "Doslo je do greske";
}
?>
