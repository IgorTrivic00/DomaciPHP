<?php

require 'dbBroker.php';
require "models/proizvodjac.php";

$proizvodjaci = Proizvodjac::vratiProizvodjace($konekcija);

foreach ($proizvodjaci as $proizvodjac) {
    ?>
<option value="<?= $proizvodjac->proizvodjacID ?>"><?= $proizvodjac->nazivProizvodjaca ?></option>

<?php
}