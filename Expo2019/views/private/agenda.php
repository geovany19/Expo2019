<?php
require_once('../../core/helpers/private_helper.php');
private_helper::headerTemplate('Bienvenido');
private_helper::nav();
?>
    <body>
    <main>
    <div class="row">
            <div class="col col-sm-3">
                <div id='wrap'>
                    <div id='calendar'></div>
                    <div style='clear:both'></div>
                </div>
            </div>        
    </div>
    </main>
</body>

</html>
<?php
private_helper::footerTemplate('calendario.js');
?>
