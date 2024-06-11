<?php
require_once("../../Config/config.php");
require_once(ROOT_PATH.ROOT_APP.CONTROLLER_PATH."ControllerDepartamento.php");
$getDepartamentos = new controllerDepartamento();
?>
<!-- Modal add User -->
<div class="modal fade" id="update-customer" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content container-modal-line modal-sepacing">
            <div class="modal-header ">
                <h5 class="modal-title" id="staticBackdropLabel">Actualizar Cliente</h5>
                <ion-icon name="close-outline" class="btn-close-pred-update" data-bs-dismiss="modal"></ion-icon>
            </div>
            <div class="modal-body">
                <form method="post" class="add forms">
                <input type="hidden" id="customeridedit" name="customeridedit">
                    <div class="form__input">
                        <input type="text" name="customeridentificacionedit" id="customeridentificacionedit" placeholder="NIT | Identificacion"
                            class="input__nitidentificacion" required autocomplete="off">
                        <ion-icon name="reader-outline"></ion-icon>
                    </div>
                    <div class="form__input">
                        <input type="text" name="customernombreedit" id="customernombreedit" placeholder="Nombre del Cliente"
                            class="input__customernombre" required autocomplete="off">
                        <ion-icon name="man-outline"></ion-icon>
                    </div>
                    <div class="form__input">
                        <input type="text" name="customerestablecimientoedit" id="customerestablecimientoedit" placeholder="Nombre del Establecimiento"
                            class="input__customerestablecimiento" required autocomplete="off">
                        <ion-icon name="business-outline"></ion-icon>
                    </div>
                    <div class="form__input">
                        <input type="text" name="customerresponsableedit" id="customerresponsableedit" placeholder="Nombre del Responsable"
                            class="input__customerresponsable" required autocomplete="off">
                        <ion-icon name="cash-outline"></ion-icon>
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
                        <input type="text" name="customerdireccionedit" id="customerdireccionedit" placeholder="Dirección del Cliente" 
                        class="input__customerdireccion" required autocomplete="off">
                        <ion-icon name="storefront-outline"></ion-icon>
                    </div>
                    <div class="form__input">
                        <input type="text" name="customertelefonoedit" id="customertelefonoedit" placeholder="Teléfono del Cliente" 
                        class="input__customertelefono" required autocomplete="off">
                        <ion-icon name="call-outline"></ion-icon>
                    </div>
                    <div class="form__input">
                        <input type="text" name="customercorreoedit" id="customercorreoedit" placeholder="Correo del Cliente"
                            class="input__customercorreo" required autocomplete="off">
                        <ion-icon name="mail-unread-outline"></ion-icon>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="add-button__close close-update" data-bs-dismiss="modal" id="close" name="close">
                            <ion-icon name="close-outline"></ion-icon>
                            <span class="add-button__btntext">Cerrar</span>
                        </button>
                        <button class="add-button__button update" type="button" id="customerupdate" name="update" value="update">
                            <ion-icon name="create-outline"></ion-icon>
                            <span class="add-button__btntext">Actualizar</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>