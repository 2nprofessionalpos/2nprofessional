<?php
require_once("../../Config/config.php");
require_once(ROOT_PATH.ROOT_APP.CONTROLLER_PATH."ControllerDepartamento.php");

$getDepartamentos = new controllerDepartamento();
?>
<!--Modal update User-->
<div class="modal fade " id="update-user" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content container-modal-line">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Actualizar Usuario</h5>
                <ion-icon name="close-outline" class="btn-close-pred-update" data-bs-dismiss="modal"></ion-icon>
            </div>
            <div class="modal-body">
                <form method="post" class="add forms">
                    <input type="hidden" id="useridedit" name="useridedit">
                    <div class="row">
                        <div class="col alertone">
                            <div class="form__input">
                                <input type="text" name="useridentificacionedit" id="useridentificacionedit" placeholder="Número Identificación"
                                    class="input__useridentificacion" required autocomplete="off">
                                <ion-icon name="person-outline"></ion-icon>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form__input">
                                <input type="text" name="usernombresedit" id="usernombresedit" placeholder="Nombres del Usuario"
                                    class="input__usernombres" required autocomplete="off">
                                <ion-icon name="accessibility-outline"></ion-icon>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form__input">
                                <input type="text" name="userapellidosedit" id="userapellidosedit" placeholder="Apellidos del Usuario"
                                    class="input__userapellidos" required autocomplete="off">
                                <ion-icon name="body-outline"></ion-icon>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form__input">
                                <input type="text" name="usertelefonoedit" id="usertelefonoedit" placeholder="Teléfono del Usuario" class="input__usertelefono" required autocomplete="off">
                                <ion-icon name="call-outline"></ion-icon>
                            </div>
                        </div>
                    </div>
                    <div class="form__input">
                        <input type="text" name="usercorreoedit" id="usercorreoedit" placeholder="Correo del Usuario"
                            class="input__usercorreo" required autocomplete="off">
                        <ion-icon name="mail-unread-outline"></ion-icon>
                    </div>
                
                    <div class="form__input">
                        <select class="input__select" name="departamentosedit" id="departamentosedit">
                            <option value="0" selected>Seleccione Departamento</option>
                                <?php foreach($getDepartamentos->listDepartamentos() as $r){?>
                                    <option value="<?php echo $r->getDepartamentoId();?>"><?php echo $r->getDepartamentoNombre();?></option>
                                <?php } ?>
                        </select>
                    </div>
                        
                    <div class="form__input">
                        <select class="input__select" name="municipiosedit" id="municipiosedit">
                            <option value="" selected>-----------------------</option>
                        </select>
                    </div>
                    
                    <div class="form__input">
                        <input type="text" name="userdireccionedit" id="userdireccionedit" placeholder="Dirección del Usuario" 
                        class="input__userdireccion" required autocomplete="off">
                        <ion-icon name="storefront-outline"></ion-icon>
                    </div>
                    <div class="form__input">
                        <select class="input__select" name="userestadoedit" id="userestadoedit">
                            <option value="-1">Seleccione Estado del Usuario</option>
                            <option value="0">Inactivo</option>
                            <option value="1" selected>Activo</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="add-button__close close-update" data-bs-dismiss="modal" id="close-update" name="close-update">
                            <ion-icon name="close-outline"></ion-icon>
                            <span class="add-button__btntext">Cerrar</span>
                        </button>
                        <button class="add-button__button update" type="button" id="userupdate" name="update" value="update">
                            <ion-icon name="create-outline"></ion-icon>
                            <span class="add-button__btntext">Actualizar</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
