<div class="container-buttons">
    <div class="container__add-search">
        <div class="add-button">
            <button class="add-button__button" type="button" data-bs-toggle="modal" data-bs-target="#add-product">
                <ion-icon name="add-outline"></ion-icon>
                <span class="add-button__btntext">Agregar Producto</span>
            </button>
        </div>

        <?php require_once("Formproductadd.php"); ?>
    </div>       
</div>

<div class="table-responsive">
    <table id="tableproduct" class="table table-striped w-100" >
        <thead>
            <tr>
                <th scope="col">Codigo Producto</th>
                <th scope="col">Producto</th>
                <th scope="col">Codigo de Barras</th>
                <th scope="col">Estado</th>
                <th scope="col">IVA</th>
                <th scope="col">Precio</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    <?php 
        require_once("Formproductupdate.php");
    ?>
</div>

<script type="text/javascript" language="javascript" src="../Middleware/Product/Product.js"></script>