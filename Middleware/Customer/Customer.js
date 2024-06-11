$(document).ready(function(){

    let datatablesCustomer = $('#tablacustomer').DataTable({
            "retrieve": "true",
            "paging": "false",
            "searching": "false",
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
                    "method":"POST",
                    "url": "../Services/customer/DataTableCustomer.php"
                },
                "columns": [
                    {"data":"customer_nitid"},
                    {"data":"customer_nombreestablecimiento"},
                    {"data":"customer_responsable"},
                    {"data":"customer_telefono"},
                    {"data":"customer_fecharegistro"},
                    { "responsivePriority": "1",
                        "data": null,
                        "defaultContent":'<div class="d-flex flex-row bd-highlight mb-3"><button class="btn btn-outline-primary btn-sm btn-update" type="button" id="update" name="update" data-bs-toggle="modal" data-bs-target="#update-customer"><ion-icon name="sync-outline"></ion-icon></button><button class="btn btn-outline-danger btn-sm btn-delete" type="button" id="deletecustomer" name="delete" value="delete"><ion-icon name="trash-outline"></ion-icon></button></div>'
                    }
                ]
    });
    
    getdataDataTable('#tablacustomer tbody', datatablesCustomer);

    $(".close").on("click", function(e){
        e.preventDefault();
        clearmodal();
    });


    $(".btn-close-pred").on("click", function(e){
        e.preventDefault();
        clearmodal();
    });

    $("#create").on("click",function(e){
        e.preventDefault();
        createCustomer(datatablesCustomer);
    });

    $("#customerupdate").on("click",function(e){
        e.preventDefault();
        updateCustomer(datatablesCustomer);
    });

});

function clearmodal(){
    $("#customeridentificacion").val('');
    $("#customernombre").val('');
    $("#customerestablecimiento").val('');
    $("#customerresponsable").val('');
    $("#departamentos").val('0');
    $("#municipios").val('');
    $("#customerdireccion").val('');
    $("#customertelefono").val('');
    $("#customercorreo").val('');
}

function clearmodalupdate(){
    $("#customeridedit").val('');
    $("#customeridentificacionedit").val('');
    $("#customernombreedit").val('');
    $("#customerestablecimientoedit").val('');
    $("#customerresponsableedit").val('');
    $("#departamentosedit").val('0');
    $("#municipiosedit").val('');
    $("#customerdireccionedit").val('');
    $("#customertelefonoedit").val('');
    $("#customercorreoedit").val('');
}

function getdataDataTable(tbody, table){

    $("#municipiosedit").prop('disabled', true);

    $(tbody).on("click",".btn-update", function(){
        let data = table.row($(this).parents("tr")).data();

        $("#departamentosedit option[value="+data.customer_departamento+"]").attr("selected", true);
        let selectuno = $("#departamentosedit");
        let selectdos = $("#municipiosedit");
        getMunicipios(selectuno, selectdos, data.customer_municipio);
        
        let customer_identificador = $("#customeridedit").val(data.customer_id),
            customer_identificacion = $("#customeridentificacionedit").val(data.customer_nitid),
            customer_nombre = $("#customernombreedit").val(data.customer_nombre),
            customer_establecimiento = $("#customerestablecimientoedit").val(data.customer_establecimiento),
            customer_responsable = $("#customerresponsableedit").val(data.customer_responsable),
            customer_departamento = $("#departamentosedit option:selected").val(),
            customer_municipio = $("#municipiosedit option:selected").val(),
            customer_direccion = $("#customerdireccionedit").val(data.customer_direccion),
            customer_telefono = $("#customertelefonoedit").val(data.customer_telefono),
            customer_correo = $("#customercorreoedit").val(data.customer_correo);
    });

    $(tbody).on("click",".btn-delete", function(){
        let data = table.row($(this).parents("tr")).data();
        let option = $("button[id='deletecustomer']").val(); 
        deleteCustomer(table,data.customer_id,option);
    });
}

function deleteCustomer(table, idcustomer, option){
    let parametros = {"customeridentificador":idcustomer, "accion": option}
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
                url: "../Services/customer/APIcustomer.php",
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
                            text: "El registro cliente fue eliminado.",
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

function getMunicipios(selectuno, selectdos, opcionselectuno){
    if(selectuno.val() > 0){
        let departamentoid = selectuno.val();
        datos = {"departamentoid":departamentoid};
        $.ajax({
            data: datos,
            url: "../Services/municipio/Municipio.php",
            type: "POST",
            success: function(response){
                selectuno.prop('disabled', false);
                selectdos.find('option').remove();
                selectdos.append('<option value="">Seleccione Municipio</option>');   
                $(response.data).each(function(data, r){ // indice, valor
                    if(opcionselectuno == r.municipio_id){
                        selectdos.append('<option value="' + r.municipio_id + '" selected>' + r.municipio_nombre + '</option>');
                    }
                    else{
                        selectdos.append('<option value="' + r.municipio_id + '">' + r.municipio_nombre + '</option>'); 
                    }      
                })
                selectdos.prop('disabled', false);
            },
            error: function(error){
                console.log(error);
                alert('Ocurrio un error en el servidor ..');
                selectuno.prop('disabled', false);
            }
        });
    }
    else{
        selectdos.find('option').remove();
        selectdos.prop('disabled', true);
    }
 }

function createCustomer(table){
    let customer_identificacion = $("#customeridentificacion").val();
    let customer_nombre = $("#customernombre").val();
    let customer_establecimiento = $("#customerestablecimiento").val();
    let customer_responsable = $("#customerresponsable").val();
    let customer_departamento = $("#departamentos option:selected").val();
    let customer_municipio = $("#municipios option:selected").val();
    let customer_direccion = $("#customerdireccion").val();
    let customer_telefono = $("#customertelefono").val();
    let customer_correo = $("#customercorreo").val();
    let option = $("button[id='create']").val();

    if((customer_identificacion != null && customer_identificacion != "") &&
        (customer_nombre != null && customer_nombre != "") &&
        (customer_establecimiento != null && customer_establecimiento != "") &&
        (customer_responsable != null && customer_responsable != "") &&
        (customer_departamento != null && customer_departamento != "" && customer_departamento > 0) &&
        (customer_municipio != null && customer_municipio != "" && customer_municipio > 0) &&
        (customer_direccion != null && customer_direccion != "") &&
        (customer_telefono != null && customer_telefono != "") &&
        (customer_correo != null && customer_correo != "")
    ){
        let emailRegex = /^(?:[^<>()[\].,;:\s@"]+(\.[^<>()[\].,;:\s@"]+)*|"[^\n"]+")@(?:[^<>()[\].,;:\s@"]+\.)+[^<>()[\]\.,;:\s@"]{2,63}$/i;

        if(emailRegex.test(customer_correo)){

            if(customer_correo.length < 64){

                let parametros = {
                    "customeridentificacion": customer_identificacion,
                    "customernombre": customer_nombre,
                    "customerestablecimiento": customer_establecimiento,
                    "customerresponsable": customer_responsable,
                    "customerdepartamento": customer_departamento,
                    "customermunicipio": customer_municipio,
                    "customerdireccion": customer_direccion,
                    "customertelefono": customer_telefono,
                    "customercorreo": customer_correo,
                    "accion": option
                }

                $.ajax({
                    data:parametros,
                    type:"POST",
                    url: "../Services/customer/APIcustomer.php",
                    success: function(datos){
                        let mensajeone = datos.errorsone;
                        let mensajetwo = datos.errorstwo;
                        let mensajethree = datos.errorsthree;
                        if(mensajethree != "" && mensajethree != null){
                            swal.fire({
                                title: " NIT o Identificación y correo electrónico registrado",
                                text: mensajethree,
                                icon: "warning",
                                buttons: true,
                                confirmButtonText: "Aceptar"
                            });
                        }else if(mensajeone != "" && mensajeone != null){
                            swal.fire({
                                title: "NIT o Identificación registrada",
                                text: mensajeone,
                                icon: "warning",
                                buttons: true,
                                confirmButtonText: "Aceptar"
                            });  
                        }else if(mensajetwo != "" && mensajetwo != null){
                            swal.fire({
                                title: "Correo electrónico registrado",
                                text: mensajetwo,
                                icon: "warning",
                                buttons: true,
                                confirmButtonText: "Aceptar"
                            });  
                        }
                        else{
                            clearmodal();
                            $('#add-customer').modal('hide');
                            swal.fire({
                                title: "Registro exitoso",
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
            else{
                swal.fire({
                    title: "Caracteres del Correo Electrónico",
                    text: "El correo electrónico no puede ser superior a 64 caracteres",
                    icon: "warning",
                    buttons: true,
                    confirmButtonText: "Aceptar"
                });
            }
        }
        else{
            swal.fire({
                title: "Formato de Correo",
                text: "Su dirección de correo electrónico no está en un formato de correo electrónico válido",
                icon: "warning",
                buttons: true,
                confirmButtonText: "Aceptar"
            });

        }

    }
    else{
        swal.fire({
            title: "Datos incompletos",
            text: "Por favor completar los datos del cliente en el formulario",
            icon: "warning",
            buttons: true,
            confirmButtonText: "Aceptar"
        });
    }
}

function updateCustomer(table){
    let customer_identificador = $("#customeridedit").val();
    let customer_identificacion = $("#customeridentificacionedit").val();
    let customer_nombre = $("#customernombreedit").val();
    let customer_establecimiento = $("#customerestablecimientoedit").val();
    let customer_responsable = $("#customerresponsableedit").val();
    let customer_departamento = $("#departamentosedit").val();
    let customer_municipio = $("#municipiosedit").val();
    let customer_direccion = $("#customerdireccionedit").val();
    let customer_telefono = $("#customertelefonoedit").val();
    let customer_correo = $("#customercorreoedit").val();
    let optionupdate = $("button[id='customerupdate']").val();

    console.log("Llegue a modificar cliente");

    if((customer_identificador != null && customer_identificador != "") &&
        (customer_identificacion != null && customer_identificacion != "") &&
        (customer_nombre != null && customer_nombre != "") &&
        (customer_establecimiento != null && customer_establecimiento != "") &&
        (customer_responsable != null && customer_responsable != "") &&
        (customer_departamento != null && customer_departamento != "" && customer_departamento > 0) &&
        (customer_municipio != null && customer_municipio != "" && customer_municipio > 0) &&
        (customer_direccion != null && customer_direccion != "") &&
        (customer_telefono != null && customer_telefono != "") &&
        (customer_correo != null && customer_correo != "")
    ){
        let emailRegex = /^(?:[^<>()[\].,;:\s@"]+(\.[^<>()[\].,;:\s@"]+)*|"[^\n"]+")@(?:[^<>()[\].,;:\s@"]+\.)+[^<>()[\]\.,;:\s@"]{2,63}$/i;

        if(emailRegex.test(customer_correo)){

            if(customer_correo.length < 64){

                let parametros = {
                    "customeridentificador": customer_identificador,
                    "customeridentificacion": customer_identificacion,
                    "customernombre": customer_nombre,
                    "customerestablecimiento": customer_establecimiento,
                    "customerresponsable": customer_responsable,
                    "customerdepartamento": customer_departamento,
                    "customermunicipio": customer_municipio,
                    "customerdireccion": customer_direccion,
                    "customertelefono": customer_telefono,
                    "customercorreo": customer_correo,
                    "accion": optionupdate
                }

                $.ajax({
                    data:parametros,
                    type:"POST",
                    url: "../Services/customer/APIcustomer.php",
                    success: function(datos){
                        let mensajeone = datos.errorsone;
                        let mensajetwo = datos.errorstwo;
                        let mensajethree = datos.errorsthree;
                        if(mensajeone != "" && mensajeone != null){
                            swal.fire({
                                title: "NIT o Identificación registrada",
                                text: mensajeone,
                                icon: "warning",
                                buttons: true,
                                confirmButtonText: "Aceptar"
                            });  
                        }
                        else if(mensajetwo != "" && mensajetwo != null){
                            swal.fire({
                                title: "Correo electrónico registrado",
                                text: mensajetwo,
                                icon: "warning",
                                buttons: true,
                                confirmButtonText: "Aceptar"
                            });  
                        }
                        else if(mensajethree != "" && mensajethree != null){
                            swal.fire({
                                title: " NIT o Identificación y correo electrónico registrado",
                                text: mensajethree,
                                icon: "warning",
                                buttons: true,
                                confirmButtonText: "Aceptar"
                            });  
                        }
                        else{
                            table.ajax.reload();
                            $('#update-customer').modal('hide');
                            swal.fire({
                                title: "Se actualizó cliente correctamente",
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
                    title: "Caracteres del Correo Electrónico",
                    text: "El correo electrónico no puede ser superior a 64 caracteres",
                    icon: "warning",
                    buttons: true,
                    confirmButtonText: "Aceptar"
                });
            }
        }
        else{
            swal.fire({
                title: "Caracteres del Correo Electrónico",
                text: "El correo electrónico no puede ser superior a 64 caracteres",
                icon: "warning",
                buttons: true,
                confirmButtonText: "Aceptar"
            });
        }    
    }
    else{
        swal.fire({
            title: "Datos incompletos",
            text: "Por favor completar los datos del cliente en el formulario",
            icon: "warning",
            buttons: true,
            confirmButtonText: "Aceptar"
        });
    }
}