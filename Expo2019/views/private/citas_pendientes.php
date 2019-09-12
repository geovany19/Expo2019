<?php
require_once('../../core/helpers/private_helper.php');
private_helper::headerTemplate('Citas Pendientes');
private_helper::nav();
?>
<table class="table" id="table-citas2">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Paciente</th>
      <th scope="col">Fecha cita</th>
      <th scope="col">Hora cita</th>
      <th scope="col">Estado cita </th>
    </tr>
  </thead>
  <tbody id="table-body2">
  </tbody>
</table>


<?php
private_helper::footerTemplate('citas_pendientes.js');
?>
