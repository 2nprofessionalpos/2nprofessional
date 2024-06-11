<!--Modal update User Password-->
<div class="modal fade " id="update-userpassword" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content container-modal-line">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Actualizar Nombre de Usuario y Contraseña</h5>
                <ion-icon name="close-outline" class="btn-close-pred-update-password" data-bs-dismiss="modal"></ion-icon>
            </div>
            <div class="modal-body">
                <form method="post" class="add forms">
                    <input type="hidden" id="useridpasswordedit" name="useridpasswordedit">
                    <input type="hidden" id="useridentificacionpasswordedit" name="useridentificacionpasswordedit">
                    <input type="hidden" id="usernombrespasswordedit" name="usernombrespasswordedit">
                    <input type="hidden" id="userapellidospasswordedit" name="userapellidospasswordedit">
                    <input type="hidden" id="usertelefonopasswordedit" name="usertelefonopasswordedit">
                    <input type="hidden" id="usercorreopasswordedit" name="usercorreopasswordedit">
                    <input type="hidden" id="userdepartamentopasswordedit" name="userdepartamentopasswordedit">
                    <input type="hidden" id="usermunicipiopasswordedit" name="usermunicipiopasswordedit">
                    <input type="hidden" id="userdireccionpasswordedit" name="userdireccionpasswordedit">
                    <input type="hidden" id="userestadopasswordedit" name="userestadopasswordedit">
                    <div class="form__input">
                        <input type="text" name="usernameedit" id="usernameedit" placeholder="Nombre Usuario" class="input__username" required autocomplete="off">
                        <ion-icon name="person-circle-outline"></ion-icon>
                    </div>
                    <div class="form__input">
                        <input type="password" name="userpasswordedit" id="userpasswordedit" placeholder="Clave Usuario" class="input__userpassword" required autocomplete="off">
                        <ion-icon name="reader-outline"></ion-icon>
                    </div>
                    <div class="form__input">
                        <input type="password" name="userpasswordrepedit" id="userpasswordrepedit" placeholder="Repita Clave Usuario" class="input__userpassword" required autocomplete="off">
                        <ion-icon name="reader-outline"></ion-icon>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="add-button__close close-update-password" data-bs-dismiss="modal" id="close-update" name="close-update">
                            <ion-icon name="close-outline"></ion-icon>
                            <span class="add-button__btntext">Cerrar</span>
                        </button>
                        <button class="add-button__button update" type="button" id="userupdatepassword" name="updatepassword" value="updatepassword">
                            <ion-icon name="create-outline"></ion-icon>
                            <span class="add-button__btntext">Actualizar</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


