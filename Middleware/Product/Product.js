$(document).ready(function(){

    let datatablesProduct = $('#tableproduct').DataTable({
        "retrieve": "true",
        "paging": "false",
        "searching": "false",
        "serverSide": "true",
        "language": {
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        },
        "buttons": {
            "copy": "Copiar",
            "colvis": "Visibilidad"
        },
        },
            "lengthMenu":				[[5, 10, 15], [5, 10, 15]],
            "iDisplayLength":			10,
            "responsive":               "true",
            "bJQueryUI":				"false",
            "ajax":{
                "type":"POST",
                "url": "../Services/product/DataTableProduct.php"
            },
            "columns": [
                {"data":"product_codigo"},
                {"data":"product_nombre"},
                {"data":"product_codigobarras"},
                {"data":"product_estado_nombre"},
                {"data":"product_iva_nombre"},
                {"data":"product_precio_pesos"},
                { "responsivePriority": "1",
                    "data": null,
                    "defaultContent":'<div class="d-flex flex-row bd-highlight mb-3"><button class="btn btn-outline-primary btn-sm btn-update" type="button" id="update" name="update" data-bs-toggle="modal" data-bs-target="#update-product"><ion-icon name="sync-outline"></ion-icon></button><button class="btn btn-outline-danger btn-sm btn-delete" type="button" id="deleteproduct" name="delete" value="delete"><ion-icon name="trash-outline"></ion-icon></button></div>'
                }
            ]
    });

    getdataDataTable('#tableproduct tbody', datatablesProduct);

    $(".close").on("click", function(e){
        e.preventDefault();
        clearmodal();
    });


    $(".btn-close-pred").on("click", function(e){
        e.preventDefault();
        clearmodal();
    });

    $("#createproduct").on("click",function(e){
        e.preventDefault();
        createProduct(datatablesProduct);
    });

    $("#updateproduct").on("click",function(e){
        e.preventDefault();
        updateProduct(datatablesProduct);
    });

});


function clearmodal(){
    $("#productcodigo").val('');
    $("#productnombre").val('');
    $("#productdetalle").val('');
    $("#productcodigobarras").val('');
    $("#productestado").val('0');
    $("#productiva").val('');
    $("#productvalor").val('');
}

function createProduct(table){
    let product_codigo = $("#productcodigo").val();
    let product_nombre = $("#productnombre").val();
    let product_detalle = $("#productdetalle").val();
    let product_codigobarras = $("#productcodigobarras").val();
    let product_estado = $("#productestado option:selected").val();
    let product_iva = $("#productiva").val();
    let product_valor = $("#productvalor").val();
    let option = $("button[id='createproduct']").val();

    if((product_codigo != null && product_codigo != "") &&
        (product_nombre != null && product_nombre != "") &&
        (product_detalle != null && product_detalle != "") &&
        (product_codigobarras != null && product_codigobarras != "") &&
        (product_estado != null && product_estado > -1) &&
        (product_iva != null && product_iva != "") &&
        (product_valor != null && product_valor != "")
    ){
        let parametros = {
            "productcodigo": product_codigo,
            "productnombre": product_nombre,
            "productdetalle": product_detalle,
            "productcodigobarras": product_codigobarras,
            "productestado": product_estado,
            "productiva": product_iva,
            "productvalor": product_valor,
            "accion": option
        }

        $.ajax({
            data:parametros,
            type:"POST",
            url: "../Services/product/APIproduct.php",
            success: function(datos){
                let mensajeone = datos.errorsone;
                let mensajetwo = datos.errorstwo;
                let mensajethree = datos.errorsthree;
                if(mensajeone != "" && mensajeone != null){
                    swal.fire({
                        title: "Código y código de barras del Producto registrados.",
                        text: mensajeone,
                        icon: "warning",
                        buttons: true,
                        confirmButtonText: "Aceptar"
                    });
                }else if(mensajetwo != "" && mensajetwo != null){
                    swal.fire({
                        title: "Código del producto registrado.",
                        text: mensajetwo,
                        icon: "warning",
                        buttons: true,
                        confirmButtonText: "Aceptar"
                    });  
                }else if(mensajethree != "" && mensajethree != null){
                    swal.fire({
                        title: "Código de barras del producto registrado.",
                        text: mensajethree,
                        icon: "warning",
                        buttons: true,
                        confirmButtonText: "Aceptar"
                    });  
                }
                else{
                    clearmodal();
                    $('#add-product').modal('hide');
                    table.ajax.reload();
                    swal.fire({
                        title: "Registro exitoso",
                        icon: "success",
                        animation: true,
                        showConfirmButton: false,
                        timer: 2000
                    });
                }
            }
        });      
    }
    else{
        swal.fire({
            title: "Datos incompletos",
            text: "Por favor completar los datos del producto en el formulario",
            icon: "warning",
            buttons: true,
            confirmButtonText: "Aceptar"
        });
    }
}

function updateProduct(table){
    let product_id = $("#productidedit").val();
    let product_codigo = $("#productcodigoedit").val();
    let product_nombre = $("#productnombreedit").val();
    let product_detalle = $("#productdetalleedit").val();
    let product_codigobarras = $("#productcodigobarrasedit").val();
    let product_estado = $("#productestadoedit option:selected").val();
    let product_iva = $("#productivaedit").val();
    let product_valor = $("#productvaloredit").val();
    let option = $("button[id='updateproduct']").val();

    if((product_id != null && product_id != "") &&
        (product_codigo != null && product_codigo != "") &&
        (product_nombre != null && product_nombre != "") &&
        (product_detalle != null && product_detalle != "") &&
        (product_codigobarras != null && product_codigobarras != "") &&
        (product_estado != null && product_estado > -1) &&
        (product_iva != null && product_iva != "") &&
        (product_valor != null && product_valor != "")
    ){
        let parametros = {
            "productid": product_id,
            "productcodigo": product_codigo,
            "productnombre": product_nombre,
            "productdetalle": product_detalle,
            "productcodigobarras": product_codigobarras,
            "productestado": product_estado,
            "productiva": product_iva,
            "productvalor": product_valor,
            "accion": option
        }

        $.ajax({
            data:parametros,
            type:"POST",
            url: "../Services/product/APIproduct.php",
            success: function(datos){
                let mensajeone = datos.errorsone;
                let mensajetwo = datos.errorstwo;
                let mensajethree = datos.errorsthree;
                if(mensajeone != "" && mensajeone != null){
                    swal.fire({
                        title: "Código y código de barras del Producto registrados.",
                        text: mensajeone,
                        icon: "warning",
                        buttons: true,
                        confirmButtonText: "Aceptar"
                    });
                }else if(mensajetwo != "" && mensajetwo != null){
                    swal.fire({
                        title: "Código del producto registrado.",
                        text: mensajetwo,
                        icon: "warning",
                        buttons: true,
                        confirmButtonText: "Aceptar"
                    });  
                }
                else if(mensajethree != "" && mensajethree != null){
                    swal.fire({
                        title: "Código de barras del Producto registrados.",
                        text: mensajethree,
                        icon: "warning",
                        buttons: true,
                        confirmButtonText: "Aceptar"
                    });  
                }
                else{
                    $('#update-product').modal('hide');
                    table.ajax.reload();
                    swal.fire({
                        title: "Se actualizó producto correctamente",
                        icon: "success",
                        animation: true,
                        showConfirmButton: false,
                        timer: 2000
                    });
                }
            }
        });      
    }
    else{
        swal.fire({
            title: "Datos incompletos",
            text: "Por favor completar los datos del producto en el formulario",
            icon: "warning",
            buttons: true,
            confirmButtonText: "Aceptar"
        });
    }
}

function getdataDataTable(tbody, table){

    $(tbody).on("click",".btn-update", function(){
        let data = table.row($(this).parents("tr")).data();
        $("#productestadoedit option[value="+data.product_estado+"]").attr("selected", true);
        let product_id = $("#productidedit").val(data.product_id),
            product_codigo = $("#productcodigoedit").val(data.product_codigo),
            product_nombre = $("#productnombreedit").val(data.product_nombre),
            product_detalle = $("#productdetalleedit").val(data.product_detalle),
            product_codigobarras = $("#productcodigobarrasedit").val(data.product_codigobarras),
            product_estado = $("#productestadoedit option:selected").val(),
            product_iva = $("#productivaedit").val(data.product_iva),
            product_valor = $("#productvaloredit").val(data.product_precio);
    });

    $(tbody).on("click",".btn-delete", function(){
        let data = table.row($(this).parents("tr")).data();
        let option = $("button[id='deleteproduct']").val(); 
        deleteProduct(table,data.product_id,option);
    });
}

function deleteProduct(table, productid, option){
    let parametros = {"productid":productid, "accion": option}
    Swal.fire({
        title: '¿Estás seguro?',
        text: "Se eliminará de forma permanente!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar registro'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                data:parametros,
                type:"POST",
                url: "../Services/product/APIproduct.php",
                success: function(data){
                    let mensaje = data.errors;
                    if(mensaje != "" && mensaje != null){
                        swal.fire({
                            title: "Existe un error al eliminar",
                            text: mensaje,
                            icon: "warning",
                            buttons: true,
                            confirmButtonText: "Aceptar"
                        });  
                    }
                    else{
                        Swal.fire({
                            title: "Eliminado!",
                            text: "El registro producto fue eliminado.",
                            icon: "success",
                            animation: true,
                            showConfirmButton: false,
                            timer: 2000
                        });
                        table.ajax.reload();
                    }
                }
            });      
        }
    })
}


