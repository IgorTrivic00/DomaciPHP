<?php

require 'dbBroker.php';
require "models/automobil.php";

$automobili = Automobil::vratiAutomobile($konekcija);

foreach ($automobili as $automobil) {
    ?>
<option value="<?= $automobil->automobilID ?>"><?= $automobil->naziv ?></option>
<?php
}
