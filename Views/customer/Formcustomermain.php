<div class="container-buttons">
    <div class="container__add-search">
        <div class="add-button">
            <button class="add-button__button" type="button" data-bs-toggle="modal" data-bs-target="#add-customer">
                <ion-icon name="add-outline"></ion-icon>
                <span class="add-button__btntext">Agregar Cliente</span>
            </button>
        </div>

        <?php require_once("Formcustomeradd.php"); ?>
    </div>       
</div>

<div class="table-responsive">
    <table id="tablacustomer" class="table table-striped w-100" >
        <thead>
            <tr>
                <th scope="col">NIT | Identificación</th>
                <th scope="col">Nombre Establecimiento</th>
                <th scope="col">Responsable</th>
                <th scope="col">Telefono</th>
                <th scope="col">Fecha Registro</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    <?php 
        require_once("Formcustomerupdate.php");
    ?>
</div>

<script type="text/javascript" language="javascript" src="../Middleware/Municipio/Municipios.js"></script>
<script type="text/javascript" language="javascript" src="../Middleware/Customer/Customer.js"></script>