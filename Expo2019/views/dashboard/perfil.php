<?php
include "../../core/helpers/dashboardHelper.php";
dashboardHelper::head("Editar perfil");
dashboardHelper::nav();
?>
<main>
    <div class="container">
        <h2 class="text-center">Configuración del perfil</h2>
        <button type="button" class="btn btn-outline-info btn-lg btn-block" onclick="modalProfile()" data-target="#modal-profile">
            <i class="fas fa-user-edit"></i>
            Editar perfil</button>
        <button type="button" data-toggle="modal" data-target="#modal-password" class="btn btn-outline-warning btn-lg btn-block">
            <i class="fas fa-key"></i>
            Modificar contraseña</button>
        <hr>
    </div>
</main>
<div class="modal fade" id="modal-profile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header justify-content-center aling-items-center">
                <h5 class="modal-title" id="exampleModalLongTitle">Actualizar perfil</h5>
            </div>
            <div class="modal-body">
                <div class="d-flex justify-content-center" >
					<img id="foto" class="img-fluid" width="100">
				</div>
                <form id="form-profile" enctype="multipart/form-data" autocomplete="off">
                    <input type="hidden" id="id_usuario" name="id_usuario">
                    <input type="hidden" id="foto_usuario" name="foto_usuario">
                    <div class="form-group">
                        <label for="profile_nombre">Nombre</label>
                        <input type="text" class="form-control" class="form-control is-valid" id="profile_nombre" name="profile_nombre" aria-describedby="emailHelp" placeholder="Nombre">
                    </div>
                    <div class="form-group">
                        <label for="profile_apellido">Apellido</label>
                        <input type="text" class="form-control" id="profile_apellido" name="profile_apellido" placeholder="Apellido">
                    </div>
                    <div class="form-group">
                        <label for="profile_correo">Correo</label>
                        <input type="text" class="form-control" id="profile_correo" name="profile_correo" placeholder="Correo">
                    </div>
                    <div class="form-group">
                        <label for="profile_usuario">Usuario</label>
                        <input type="text" class="form-control" id="profile_usuario" name="profile_usuario" placeholder="Usuario">
                    </div>
                    <div class="form-group">
                        <label for="profile_fecha">Fecha</label>
                        <input type="date" class="form-control" id="profile_fecha" name="profile_fecha" placeholder="Fecha">
                    </div>
                    <div class="form-group">
                        <label for="update_archivo">Foto</label>
                        <input type="file" id="update_archivo" name="update_archivo" class="file-input">
                    </div>
                    <div class="modal-footer justify-content-center aling-items-center">
                    <button type="button" data-toggle="tooltip" data-placement="top" title="Cancelar" class="btn btn-danger" data-dismiss="modal"><i class="material-icons prefix">cancel</i></button>
				<button type="submit" data-toggle="tooltip" data-placement="top" title="Actualizar" class="btn btn-success" ><i class="material-icons prefix">done</i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--Modal para actualizar contraseña -->
<div class="modal fade" id="modal-password" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header justify-content-center aling-items-center">
                <h5 class="modal-title" id="exampleModalLongTitle">Modificar contraseña</h5>
            </div>
            <div class="modal-body">
                <form id="form-password" enctype="multipart/form-data" class="needs-validation" autocomplete="off" novalidate>
                    <div class="form-group">
                        <label for="clave_actual_1">Contraseña actual</label>
                        <input type="password" class="form-control" class="form-control is-valid" id="clave_actual_1" name="clave_actual_1" aria-describedby="emailHelp" placeholder="Contraseña actual" required>
                        <div class="invalid-feedback">Ingrese la contraseña actual</div>
                    </div>
                    <div class="form-group">
                        <label for="clave_actual_2">Confirmar contraseña actual</label>
                        <input type="password" class="form-control" id="clave_actual_2" name="clave_actual_2" placeholder="Confirmar contraseña actual" required>
                        <div class="invalid-feedback">Confirme la contraseña actual. Asegurese que ambas contraseñas coincidan.</div>
                    </div>
                    <div class="form-group">
                        <label for="clave_nueva_1">Nueva contraseña</label>
                        <input type="password" class="form-control" id="clave_nueva_1" name="clave_nueva_1" placeholder="Nueva contraseña" minlength="8" maxlength="15" required>
                        <small id="passwordHelp" class="form-text text-muted">La nueva contraseña debe ser de 7-15 caracteres de longitud. Debe contener letras, números.
                            No debe contener espacios, caracteres especiales o emojis, y no debe ser igual a la contraseña actual.</small>
                        <div class="invalid-feedback">Ingrese la nueva contraseña</div>
                    </div>
                    <div class="form-group">
                        <label for="clave_nueva_2">Confirmar nueva contraseña</label>
                        <input type="password" class="form-control" id="clave_nueva_2" name="clave_nueva_2" placeholder="Confirmar nueva contraseña" minlength="8" maxlength="15" required>
                        <div class="invalid-feedback">Confirme la contraseña. Asegurese que ambas contraseñas coincidan.</div>
                    </div>
                    <div class="modal-footer justify-content-center aling-items-center">
                        <button type="button"  data-toggle="tooltip" data-placement="top" title="Cancelar" class="btn btn-danger" data-dismiss="modal"><i class="material-icons prefix">cancel</i></button>
                        <button type="submit"  data-toggle="tooltip" data-placement="top" title="Modifica Contraseña" class="btn btn-success" ><i class="material-icons prefix">done</i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
dashboardHelper::footer('account.js');
?>