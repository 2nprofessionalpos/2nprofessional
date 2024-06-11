<!-- Modal update Product -->
<div class="modal fade" id="update-product" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content container-modal-line modal-sepacing">
            <div class="modal-header ">
                <h5 class="modal-title" id="staticBackdropLabel">Actualizar Producto</h5>
                <ion-icon name="close-outline" class="btn-close-pred" data-bs-dismiss="modal"></ion-icon>
            </div>
            <div class="modal-body">
                <form method="post" class="add forms">
                <input type="hidden" id="productidedit" name="productidedit">
                    <div class="form__input">
                        <input type="text" name="productcodigoedit" id="productcodigoedit" placeholder="Código Producto"
                        class="input__productcodigoedit" required autocomplete="off">
                        <ion-icon name="code-outline"></ion-icon>
                    </div>
                    <div class="form__input">
                        <input type="text" name="productnombreedit" id="productnombreedit" placeholder="Nombre Producto"
                        class="input__productnombre" required autocomplete="off">
                        <ion-icon name="add-circle-outline"></ion-icon>
                    </div>
                    <div class="form__input">
                        <div class="input-group border border-primary">
                            <span class="input-group-text"><ion-icon name="reader-outline"></ion-icon></span>
                            <textarea class="form-control" id="productdetalleedit" aria-label="productdetalleedit" name="productdetalle" placeholder="Detalle Producto" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="form__input">
                        <input type="number" name="productcodigobarrasedit" id="productcodigobarrasedit" placeholder="Codigo de Barras Producto"
                               class="input__codigo"  required autocomplete="off">
                        <ion-icon name="barcode-outline"></ion-icon>
                    </div>
                    <div class="form__input">
                        <select class="input__select" name="productestadoedit" id="productestadoedit">
                            <option value="-1">Seleccione Estado del Producto</option>
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
                        </select>
                    </div>
                    <div class="form__input">
                        <input type="number" name="productivaedit" id="productivaedit" placeholder="IVA Producto" class="input__productiva">
                        <ion-icon name="receipt-outline"></ion-icon>
                    </div>
                    <div class="form__input">
                        <input type="text" name="productvaloredit" id="productvaloredit" placeholder="Valor Producto" class="input__valor">
                        <ion-icon name="card-outline"></ion-icon>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="add-button__close close-update" data-bs-dismiss="modal" id="close-update" name="close-update">
                            <ion-icon name="close-outline"></ion-icon>
                            <span class="add-button__btntext">Cerrar</span>
                        </button>
                        <button class="add-button__button update" type="button" id="updateproduct" name="update" value="update">
                            <ion-icon name="create-outline"></ion-icon>
                            <span class="add-button__btntext">Actualizar</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>