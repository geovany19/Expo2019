<?php
include "../../core/helpers/private/private_helper.php";
private_helper::head("Pacientes");
private_helper::navbar();
?>
<main class="main grey lighten-3">
    <div class="row">
        <div class="col col-sm-12">
            <div class="card-content">
                <div class="col col-sm-12">
                    <div class="input-field col col-sm-12">
                        <i class="material-icons prefix">search</i>
                        <input type="text" id="autocomplete-input" class="autocomplete">
                        <label for="autocomplete-input">Buscar</label>
                    </div>
                </div>
            </div>
            <h1 class="text-center">Pacientes</h1>
            <table class="table table-responsive table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Nombre del paciente</th>
                            <th scope="col">Ultima consulta</th>
                            <th scope="col">Proxima consulta</th>
                            <th scope="col">Padecimientos</th>
                            <th scope="col">Edad</th>
                            <th scope="col">Peso</th>
                            <th scope="col">Estatura</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>herbert cornejo</td>
                            <td>07/02/19</td>
                            <td>07/03/19</td>
                            <td>gripe</td>
                            <td>23</td>
                            <td>160lb</td>
                            <td>1.65</td>
                        </tr>
                    </tbody>
                </table>
        </div>
    </div>
</main>
<?php
private_helper::footer();
?>