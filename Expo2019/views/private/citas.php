<?php
require_once('../../core/helpers/private_helper.php');
private_helper::headerTemplate('Citas');
?>
<table class="table" id="table-citas">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Paciente</th>
      <th scope="col">Fecha cita</th>
      <th scope="col">Hora cita</th>
      <th scope="col">Estado cita</th>
      <th scope="col">Ver</th>
    </tr>
  </thead>
  <tbody id="table-body">
  </tbody>
</table>


<?php
private_helper::footerTemplate('citas.js');
?>
