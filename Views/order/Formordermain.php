
        <div class="content-orders container-fluid ">
            <!--title order-->
            <div class="content-title d-flex justify-content-center">
                <h1 class="title">Orden de Pedido</h1>
            </div>

            <div class="container-check d-flex flex-wrap align-items-center justify-content-center">
                <div class="container-fluid d-flex">
                    <!--container header order-->
                    <div class="header-logo d-flex flex-column align-items-center justify-content-center ">
                        <img src="../Assets/img/logo.png" alt="" class="header--logo">
                        <div class="info-contact d-flex justify-content-center flex-wrap">
                            <p class="description">Articulos Profesionales </p>
                            <p class="description"> | 2N </p>
                            <p class="description"> + PROFESSIONAL</p>
                        </div>
                    </div>
    <form>
                    <!--information order and date-->
                    <div class="info-order d-flex flex-column align-items-center justify-content-center">
                        <!--apertura form para guardar informacion factura-->
   
                            <!--<input type="number" name="" id="" class="input--order-header" placeholder="Numero de orden" autocomplete="off" disabled>-->
                            <input type="text" name="currentDate" id="currentDate" class="input--order-header" autocomplete="off" disabled>
                        
                    </div> 
                </div>
            </div>

            <div class="container-check d-flex flex-wrap justify-content-center">
                <!--information customer -->
                <div class="header-logo container--form-order d-flex flex-wrap align-items-center justify-content-center ">
                    <div class="form__input form__input--order">
                        <input type="hidden" id="customerid" name="customerid">
                        <input name="customernitid" id="customernitid" placeholder="NIT | CC" class="input__customernitid" required autocomplete="off">
                        <ion-icon name="reader-outline"></ion-icon>
                    </div>
                    <div class="form__input form__input--order">
                        <input name= "customernombre" id="customernombre" placeholder="Nombre Cliente" class="input__customernombre" required autocomplete="off">
                        <ion-icon name="man-outline"></ion-icon>
                    </div>
                    <div class="form__input form__input--order">
                        <input type="text" name= "customerestablecimiento" id="customerestablecimiento" placeholder="Nombre Establecimiento" class="input__customerestablecimiento" autocomplete="off" disabled>
                        <ion-icon name="business-outline"></ion-icon>
                    </div>
                    <div class="form__input form__input--order">
                        <input type="text" name= "customerresponsable" id="customerresponsable" placeholder="Nombre Responsable" class="input__customerresponsable" autocomplete="off" disabled>
                        <ion-icon name="people-outline"></ion-icon>
                    </div>
                    <div class="form__input form__input--order">
                        <input type="text" name= "customerdepartamento" id="customerdepartamento" placeholder="Departamento Cliente" class="input__customerdepartamento" autocomplete="off" disabled>
                        <ion-icon name="earth-outline"></ion-icon>
                    </div>
                    <div class="form__input form__input--order">
                        <input type="text" name= "customermunicipio" id="customermunicipio" placeholder="Municipio Cliente" class="input__customermunicipio" autocomplete="off" disabled>
                        <ion-icon name="globe-outline"></ion-icon>
                    </div>
                    <div class="form__input form__input--order">
                        <input type="text" name= "customerdireccion" id="customerdireccion" placeholder="Direccion Cliente" class="input__customerdireccion" autocomplete="off" disabled>
                        <ion-icon name="storefront-outline"></ion-icon>
                    </div>
                    <div class="form__input form__input--order">
                        <input type="text" name= "customertelefono" id="customertelefono" placeholder="Teléfono Cliente" class="input__customercliente" autocomplete="off" disabled>
                        <ion-icon name="at-outline"></ion-icon>
                    </div>
                    <div class="form__input form__input--order">
                        <input type="text" name= "customercorreo" id="customercorreo" placeholder="Correo Cliente" class="input__customercliente" autocomplete="off" disabled>
                        <ion-icon name="call-outline"></ion-icon>
                    </div>
                </div>
            </div>

            <div class="container-check d-flex flex-column justify-content-center">
                <!--table products-->
                <div class="table-responsive w-100">
                    <table class="table table-responsive table-striped container-check-table">
                        <!--row title -->
                        <thead class="head-table">
                            <tr>
                              <th scope="col">Codigo</th>
                              <th scope="col">Producto</th>
                              <th scope="col">Cantidad</th>
                              <th scope="col">IVA</th>
                              <th scope="col">Vl.Unitario</th>
                              <th scope="col">Vl.Total</th>
                            </tr>
                        </thead>
                        <tbody>
                              <!--comprobar producto 1-->
                            <tr>
                            <input type="hidden" id="productid" name="productid">
                              <td><input type="text" name="productcodigo" id="productcodigo" class="input--order-fact" autocomplete="off"></td>
                              <td><input type="text" name="productnombre" id="productnombre" class="input--order-fact" autocomplete="off"></td>
                              <td><input type="text" name="productcantidad" id="productcantidad" class="input--order-fact" autocomplete="off"></td>
                              <td><input type="text" name="productiva" id="productiva" class="input--order-fact" autocomplete="off"></td>
                              <td><input type="text" name="productvalorunitario" id="productvalorunitario" class="input--order-fact" autocomplete="off"></td>
                              <td><input type="text" name="productvalortotal" id="productvalortotal" class="input--order-fact" autocomplete="off"></td>
                            </tr>
                          </tbody>
                    </table>
                  </div>
                  <!--buttons modify product - list-->
                  <?php 
                        require_once("Formorderproduct.php");
                    ?>

                  <div class="container d-flex flex-wrap justify-content-end align-items-center mb-3">
                        <button class="add-button__button btn-order-product" type="button" data-bs-target="#add-product-order">
                            <ion-icon name="add-outline"></ion-icon>
                            <span class="add-button__btntext">Agregar Producto</span>
                        </button>
                  </div> 
                </div>
                <!--footer order-->
                <div class="footer-fact container-check d-flex justify-content-between flex-wrap">
                    <div class="container-fluid">
                        <div class="row">
                            <!--observations and account bank-->
                          <div class="col">
                            <div class="input--observations">
                                <textarea name="" id="" class="observatios--input" placeholder="Observaciones"></textarea>
                            </div>
                            <div class="info-bank-account d-flex justify-content-between align-items-center">
                                <img src="../Assets/img/paypal.png" alt="" class="logo__bank">
                                <div class="info-account">
                                    <p class="description">
                                        PAGOS ELECTRONICOS</p>
                                </div>
                            </div>
                          </div>
                          <div class="col">
                            <!--footer order - total-->
                            <div class="content-input-footer-fact ">
                                <span class="width-span-fact">Subtotal</span>
                                <input type="text" class="input--footer-fact">
                            </div>
                            <!--
                            <div class="content-input-footer-fact">
                                <span class="width-span-fact">Descuento</span>
                                <input type="text" class="input--footer-fact">
                            </div>
                            -->
                            <div class="content-input-footer-fact">
                                <span class="width-span-fact">IVA</span>
                                <input type="text" class="input--footer-fact">
                            </div>
                            <div class="content-input-footer-fact">
                                <span class="width-span-fact">Total</span>
                                <input type="text" class="input--footer-fact">
                            </div>
                          </div>
                        </div>
                        <!--cierre formulario para guardar informacion pedido-->
    </form>
                    <div class="row">
                        <!--information warning-->
                        <div class="col">
                            <p class="description">
                                DESPUES DE 8 DIAS DE ENTREGADA LA MERCANCIA NO ACEPTAMOS RECLAMOS, NI DEVOLUCIONES
                                No aplica peticion en la fuente segun Ley 1955 de 2019 reglamentado con el decreto 2112  del 24/11/2019                                 dando inicio el dia 17/03/2019 se apllcara devoliciones en cambio conforme a la politica de la empresa
                            </p>
                        </div>
                    </div>

                    <div class="container d-flex flex-wrap justify-content-end align-items-center mb-3">
                        <button class="add-button__button btn-order" type="button" data-bs-toggle="modal" data-bs-target="#add-product">
                            <ion-icon name="save-outline"></ion-icon>
                            <span class="add-button__btntext">Guardar Pedido</span>
                        </button>
                  </div> 

                </div>
            </div>
        </div>

        <script type="text/javascript" language="javascript" src="../Middleware/Order/Order.js"></script>