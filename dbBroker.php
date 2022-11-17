<?php
$konekcija = new mysqli("localhost","root", "" ,"rentacar");
if($konekcija->connect_errno){
    exit("Nije moguce povezivanje sa bazom zbog greske:".$konekcija->connect_error.", kod:".$konekcija->connect_errno);
}
?>