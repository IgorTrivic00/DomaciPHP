<?php
require 'dbBroker.php';
require "models/automobil.php";

$proizvodjac = trim($_GET['proizvodjac']);
$sort = trim($_GET['sort']);

$automobili = Automobil::pretraziAutomobile($proizvodjac, $sort, $konekcija);
?>

<table class="table table-hover" style="text-align:center;">
    <thead>
        <tr>
            <th>Naziv</th>
            <th>Proizvodjac</th>
            <th>Motor</th>
            <th>Prenos</th>
            <th>Tip</th>
            <th>Cena (€ / dan)</th>
        </tr>
    </thead>
    <tbody>



<?php

foreach ($automobili as $automobil) {
    ?>
    <tr>
        <td><?= $automobil->naziv?></td>
        <td><?= $automobil->nazivProizvodjaca?></td>
        <td><?= $automobil->motor ?></td>
        <td><?= $automobil->prenos ?></td>
        <td><?= $automobil->nazivTipa ?></td>
        <td><?= $automobil->cena ?></td>
    </tr>
    <?php
}
?>
    </tbody>
</table>
