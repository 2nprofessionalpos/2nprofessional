<?php
require_once("../../Config/config.php");
require_once(ROOT_PATH.ROOT_APP.CONTROLLER_PATH."ControllerDepartamento.php");

$getDepartamentos = new controllerDepartamento();
?>
<!-- Modal add User -->
<div class="modal fade" id="add-user" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content container-modal-line modal-sepacing">
            <div class="modal-header ">
                <h5 class="modal-title" id="staticBackdropLabel">Añadir Usuario</h5>
                <ion-icon name="close-outline" class="btn-close-pred" data-bs-dismiss="modal"></ion-icon>
            </div>
            <div class="modal-body">
                <form method="post" class="add forms">
                    <div class="row">
                        <div class="col alertone">
                            <div class="form__input">
                                <input type="text" name="useridentificacion" id="useridentificacion" placeholder="Número Identificación"
                                    class="input__useridentificacion" required autocomplete="off">
                                <ion-icon name="person-outline"></ion-icon>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form__input">
                                <input type="text" name="usernombres" id="usernombres" placeholder="Nombres del Usuario"
                                    class="input__usernombres" required autocomplete="off">
                                <ion-icon name="accessibility-outline"></ion-icon>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form__input">
                                <input type="text" name="userapellidos" id="userapellidos" placeholder="Apellidos del Usuario"
                                    class="input__userapellidos" required autocomplete="off">
                                <ion-icon name="body-outline"></ion-icon>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form__input">
                                <input type="text" name="usertelefono" id="usertelefono" placeholder="Teléfono del Usuario" class="input__usertelefono" required autocomplete="off">
                                <ion-icon name="call-outline"></ion-icon>
                            </div>
                        </div>
                    </div>
                    <div class="form__input">
                        <input type="text" name="usercorreo" id="usercorreo" placeholder="Correo del Usuario"
                            class="input__usercorreo" required autocomplete="off">
                        <ion-icon name="mail-unread-outline"></ion-icon>
                    </div>
                
                    <div class="form__input">
                        <select class="input__select" name="departamentos" id="departamentos">
                            <option value="0" selected>Seleccione Departamento</option>
                                <?php foreach($getDepartamentos->listDepartamentos() as $r){?>
                                    <option value="<?php echo $r->getDepartamentoId();?>"><?php echo $r->getDepartamentoNombre();?></option>
                                <?php } ?>
                        </select>
                    </div>
                        
                    <div class="form__input">
                        <select class="input__select" name="municipios" id="municipios">
                            <option value="" selected>-----------------------</option>
                        </select>
                    </div>
                    
                    <div class="form__input">
                        <input type="text" name="userdireccion" id="userdireccion" placeholder="Dirección del Usuario" 
                        class="input__userdireccion" required autocomplete="off">
                        <ion-icon name="storefront-outline"></ion-icon>
                    </div>
                    <div class="form__input">
                        <select class="input__select" name="userestado" id="userestado">
                            <option value="-1">Seleccione Estado del Usuario</option>
                            <option value="0">Inactivo</option>
                            <option value="1" selected>Activo</option>
                        </select>
                    </div>
                    <div class="form__input">
                        <input type="text" name="username" id="username" placeholder="Nombre Usuario" class="input__username" required autocomplete="off">
                        <ion-icon name="person-circle-outline"></ion-icon>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form__input">
                                <input type="password" name="userpassword" id="userpassword" placeholder="Clave Usuario" class="input__userpassword" required autocomplete="off">
                                <ion-icon name="reader-outline"></ion-icon>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form__input">
                                <input type="password" name="userpasswordrep" id="userpasswordrep" placeholder="Repita Clave Usuario" class="input__userpassword" required autocomplete="off">
                                <ion-icon name="reader-outline"></ion-icon>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="add-button__close close" data-bs-dismiss="modal" id="close" name="close">
                            <ion-icon name="close-outline"></ion-icon>
                            <span class="add-button__btntext">Cerrar</span>
                        </button>
                        <button class="add-button__button save" type="button" id="create" name="create" value="create">
                            <ion-icon name="save-outline"></ion-icon>
                            <span class="add-button__btntext">Guardar</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>