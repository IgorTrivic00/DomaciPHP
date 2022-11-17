<?php
require 'dbBroker.php';
require "models/automobil.php";

$naziv = trim($_POST['naziv']);
$proizvodjac = trim($_POST['proizvodjac']);
$motor = trim($_POST['motor']);
$prenos = trim($_POST['prenos']);
$tipID = trim($_POST['tip']);
$cena = trim ($_POST['cena']);

if(Automobil::unesiAutomobil($naziv, $proizvodjac, $motor, $prenos, $tipID, $cena, $konekcija)){
    echo "Uspesno unet novi automobil";
}else{
    echo "Doslo je do greske";
}
