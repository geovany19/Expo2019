<?php
require_once('../../core/helpers/private_helper.php');
private_helper::headerTemplate('Bienvenido');
private_helper::nav();
?>

<div id='wrap'>

<div id='calendar'></div>

<div style='clear:both'></div>
</div>

<?php
private_helper::footerTemplate('calendario.js');
?>
