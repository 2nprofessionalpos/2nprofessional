<div class="container-buttons">
    <div class="container__add-search">
        <div class="add-button">
            <button class="add-button__button" type="button" data-bs-toggle="modal" data-bs-target="#add-user">
                <ion-icon name="add-outline"></ion-icon>
                <span class="add-button__btntext">Agregar Usuario</span>
            </button>
        </div>

        <?php require_once("Formuseradd.php"); ?>
    </div>       
</div>

<div class="table-responsive">
    <table id="tablageneral" class="table table-striped w-100" >
        <thead class="w-100">
            <tr>
                <th scope="col">Identificacion</th>
                <th scope="col">Nombres y Apellidos</th>
                <th scope="col">Correo</th>
                <th scope="col">Telefono</th>
                <th scope="col">Fecha Registro</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    <?php 
        require_once("Formuserupdate.php");
        require_once("Formuserupdatepassword.php");
    ?>
</div>

<script type="text/javascript" language="javascript" src="../Middleware/Municipio/Municipios.js"></script>
<script type="text/javascript" language="javascript" src="../Middleware/User/User.js"></script>