<?php
require_once('../../core/helpers/private_helper.php');
private_helper::headerTemplate('Citas');
?>
<table class="table" id="tabla-citas">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody id="tbody-read">
  </tbody>
</table>


<?php
private_helper::footerTemplate('account.js');
?>
