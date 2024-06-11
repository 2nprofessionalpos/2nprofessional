<!-- Modal add Product -->
<div class="modal fade" id="add-product" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content container-modal-line modal-sepacing">
            <div class="modal-header ">
                <h5 class="modal-title" id="staticBackdropLabel">Añadir Producto</h5>
                <ion-icon name="close-outline" class="btn-close-pred" data-bs-dismiss="modal"></ion-icon>
            </div>
            <div class="modal-body">
                <form method="post" class="add forms">
                    <div class="form__input">
                        <input type="text" name="productcodigo" id="productcodigo" placeholder="Código Producto"
                        class="input__productcodigo" required autocomplete="off">
                        <ion-icon name="code-outline"></ion-icon>
                    </div>
                    <div class="form__input">
                        <input type="text" name="productnombre" id="productnombre" placeholder="Nombre Producto"
                        class="input__productnombre" required autocomplete="off">
                        <ion-icon name="add-circle-outline"></ion-icon>
                    </div>
                    <div class="form__input">
                        <div class="input-group border border-primary">
                            <span class="input-group-text"><ion-icon name="reader-outline"></ion-icon></span>
                            <textarea class="input--order-fact form-control" id="productdetalle" aria-label="productdetalle" name="productdetalle" placeholder="Detalle Producto" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="form__input">
                        <input type="number" name="productcodigobarras" id="productcodigobarras" placeholder="Codigo de Barras Producto"
                               class="input__codigo"  required autocomplete="off">
                        <ion-icon name="barcode-outline"></ion-icon>
                    </div>
                    <div class="form__input">
                        <select class="input__select" name="productestado" id="productestado">
                            <option value="-1">Seleccione Estado del Producto</option>
                            <option value="1" selected>Activo</option>
                            <option value="0">Inactivo</option>
                        </select>
                    </div>
                    <div class="form__input">
                        <input type="text" name="productiva" id="productiva" placeholder="IVA Producto" class="input__productiva">
                        <ion-icon name="receipt-outline"></ion-icon>
                    </div>
                    <div class="form__input">
                        <input type="text" name="valor" id="productvalor" placeholder="Valor Producto" class="input__valor">
                        <ion-icon name="card-outline"></ion-icon>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="add-button__close close" data-bs-dismiss="modal" id="close" name="close">
                            <ion-icon name="close-outline"></ion-icon>
                            <span class="add-button__btntext">Cerrar</span>
                        </button>
                        <button class="add-button__button save" type="button" id="createproduct" name="create" value="create">
                            <ion-icon name="save-outline"></ion-icon>
                            <span class="add-button__btntext">Guardar</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>