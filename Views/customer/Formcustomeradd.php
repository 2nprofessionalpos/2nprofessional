<?php
require_once("../../Config/config.php");
require_once(ROOT_PATH.ROOT_APP.CONTROLLER_PATH."ControllerDepartamento.php");

$getDepartamentos = new controllerDepartamento();
?>
<!-- Modal add Customer -->
<div class="modal fade" id="add-customer" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content container-modal-line modal-sepacing">
            <div class="modal-header ">
                <h5 class="modal-title" id="staticBackdropLabel">Añadir Cliente</h5>
                <ion-icon name="close-outline" class="btn-close-pred" data-bs-dismiss="modal"></ion-icon>
            </div>
            <div class="modal-body">
                <form method="post" class="add forms">
                    <div class="form__input">
                        <input type="text" name="customeridentificacion" id="customeridentificacion" placeholder="NIT | Identificacion"
                            class="input__nitidentificacion" required autocomplete="off">
                        <ion-icon name="reader-outline"></ion-icon>
                    </div>
                    <div class="form__input">
                        <input type="text" name="customernombre" id="customernombre" placeholder="Nombre del Cliente"
                            class="input__customernombre" required autocomplete="off">
                        <ion-icon name="man-outline"></ion-icon>
                    </div>
                    <div class="form__input">
                        <input type="text" name="customerestablecimiento" id="customerestablecimiento" placeholder="Nombre del Establecimiento"
                            class="input__customerestablecimiento" required autocomplete="off">
                        <ion-icon name="business-outline"></ion-icon>
                    </div>
                    <div class="form__input">
                        <input type="text" name="customerresponsable" id="customerresponsable" placeholder="Nombre del Responsable"
                            class="input__customerresponsable" required autocomplete="off">
                        <ion-icon name="cash-outline"></ion-icon>
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
                        <input type="text" name="customerdireccion" id="customerdireccion" placeholder="Dirección del Cliente" 
                        class="input__customerdireccion" required autocomplete="off">
                        <ion-icon name="storefront-outline"></ion-icon>
                    </div>
                    <div class="form__input">
                        <input type="text" name="customertelefono" id="customertelefono" placeholder="Teléfono del Cliente" 
                        class="input__customertelefono" required autocomplete="off">
                        <ion-icon name="call-outline"></ion-icon>
                    </div>
                    <div class="form__input">
                        <input type="text" name="customercorreo" id="customercorreo" placeholder="Correo del Cliente"
                            class="input__customercorreo" required autocomplete="off">
                        <ion-icon name="mail-unread-outline"></ion-icon>
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