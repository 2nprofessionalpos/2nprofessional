$(document).ready(function(){

    let datatables = $('#tablageneral').DataTable( {
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
                    "url": "../Services/user/DataTableUser.php"
                },
                "columns": [
                    {"data":"user_identificacion"},
                    {"data":"user_nombre_completo"},
                    {"data":"user_correo"},
                    {"data":"user_telefono"},
                    {"data":"user_register"},
                    { "responsivePriority": "1",
                        "data": null,
                        "defaultContent":'<div class="d-flex flex-row bd-highlight mb-3 div-important"><button class="btn btn-outline-primary btn-sm btn-update" type="button" id="update" name="update" data-bs-toggle="modal" data-bs-target="#update-user"><ion-icon name="sync-outline"></ion-icon></button><button class="btn btn-outline-success btn-sm btn-update-userpassword" type="button" id="updateuserpassword" name="updateuserpassword" data-bs-toggle="modal" data-bs-target="#update-userpassword"><ion-icon name="settings-outline"></ion-icon></button><button class="btn btn-outline-danger btn-sm btn-delete" type="button" id="deleteuser" name="delete" value="delete"><ion-icon name="trash-outline"></ion-icon></button></div>'
                    }
                ]
            });

    
    getdataDataTable('#tablageneral tbody', datatables);

    getdataDataTableUserPassword('#tablageneral tbody', datatables);

    getdataDataTableDeleteUser('#tablageneral tbody', datatables);

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
        createUser(datatables);
    });

    $("#userupdate").on("click",function(e){
        e.preventDefault();
        updateUser(datatables);
    });

    $("#userupdatepassword").on("click",function(e){
        e.preventDefault();
        updateUserPassword(datatables);
    });

});

function clearmodal() {
    $("#useridentificacion").val('');
    $("#usernombres").val('');
    $("#userapellidos").val('');
    $("#usercorreo").val('');
    $("#usertelefono").val('');
    $("#departamentos").val('0');
    $("#municipios").val('');
    $("#userdireccion").val('');
    $("#userestado").val('1');
    $("#username").val('');
    $("#userpassword").val('');
    $("#userpasswordrep").val('');
}

function clearmodalupdate() {
    $("#useridedit").val('');
    $("#useridentificacionedit").val('');
    $("#usernombresedit").val('');
    $("#userapellidosedit").val('');
    $("#usercorreoedit").val('');
    $("#usertelefonoedit").val('');
    $("#departamentosedit").val('0');
    $("#municipiosedit").val('');
    $("#userdireccionedit").val('');
    $("#userestadoedit").val('1');
}

function clearmodalupdateuserpassword() {
    $("#useridentificacionpasswordedit").val('');
    $("#userapellidospasswordedit").val('');
    $("#usertelefonopasswordedit").val('');
    $("#usercorreopasswordedit").val('');
    $("#userdepartamentopasswordedit").val('0');
    $("#usermunicipiopasswordedit").val('');
    $("#userdireccionpasswordedit").val('');
    $("#userestadopasswordedit").val('');
    $("#useridpasswordedit").val('');
    $("#usernameedit").val('');
    $("#userpasswordedit").val('');
    $("#userpasswordrepedit").val('');
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

function getdataDataTable(tbody, table){
    $("#municipiosedit").prop('disabled', true);
    $(tbody).on("click",".btn-update", function(){
        let data = table.row($(this).parents("tr")).data();
        $("#departamentosedit option[value="+data.user_departamento+"]").attr("selected", true)
        let selectuno = $("#departamentosedit");
        let selectdos = $("#municipiosedit");
        getMunicipios(selectuno, selectdos, data.user_municipio);
        let user_identificador = $("#useridedit").val(data.user_id),
            user_identificacion = $("#useridentificacionedit").val(data.user_identificacion),
            user_nombres = $("#usernombresedit").val(data.user_nombres);
            user_apellidos = $("#userapellidosedit").val(data.user_apellidos);
            user_correo = $("#usercorreoedit").val(data.user_correo),
            user_telefono = $("#usertelefonoedit").val(data.user_telefono),
            user_departamento = $("#departamentos option:selected").val(),
            user_municipio = $("#municipiosedit option:selected").val();
            user_direccion = $("#userdireccionedit").val(data.user_direccion),
            user_estado = $("#userestadoedit").val(data.user_estado);
    });
}

function getdataDataTableUserPassword(tbody, table){
    clearmodalupdateuserpassword();
    $(tbody).on("click",".btn-update-userpassword", function(){
    let data = table.row($(this).parents("tr")).data();
    let user_identificador = $("#useridpasswordedit").val(data.user_id),
        user_identificacion = $("#useridentificacionpasswordedit").val(data.user_identificacion),
        user_nombres = $("#usernombrespasswordedit").val(data.user_nombres),
        user_apellidos = $("#userapellidospasswordedit").val(data.user_apellidos),
        user_correo = $("#usercorreopasswordedit").val(data.user_correo),
        user_telefono = $("#usertelefonopasswordedit").val(data.user_telefono),
        user_departamento = $("#userdepartamentopasswordedit").val(data.user_departamento),
        user_municipio = $("#usermunicipiopasswordedit").val(data.user_municipio),
        user_direccion = $("#userdireccionpasswordedit").val(data.user_direccion),
        user_estado = $("#userestadopasswordedit").val(data.user_estado),
        user_nombre = $("#usernameedit").val(data.user_nombre);
    });
}

function getdataDataTableDeleteUser(tbody, table){
    $(tbody).on("click",".btn-delete", function(){
        let data = table.row($(this).parents("tr")).data();
        let option = $("button[id='deleteuser']").val(); 
        deleteUser(table,data.user_id,option);
    });
}

function deleteUser(table, iduser, option){
    let parametros = {"useridentificador":iduser, "accion": option}
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
                url: "../Services/user/APIuser.php",
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
                            text: "El registro usuario fue eliminado.",
                            icon: "success",
                            animation: true,
                            showConfirmButton: false,
                            timer: 2000
                        });
                        table.ajax.reload();
                    }
                    datos.message;
                }
            });      
        }
    })
}


function createUser(table){
    let user_identificacion = $("#useridentificacion").val();
    let user_nombres = $("#usernombres").val();
    let user_apellidos = $("#userapellidos").val();
    let user_correo = $("#usercorreo").val();
    let user_telefono = $("#usertelefono").val();
    let user_departamento = $("#departamentos option:selected").val();
    let user_municipio = $("#municipios option:selected").val();
    let user_direccion = $("#userdireccion").val();
    let user_estado = $("#userestado option:selected").val();
    let user_name = $("#username").val();
    let user_password = $("#userpassword").val();
    let user_password_rep = $("#userpasswordrep").val();
    let option = $("button[id='create']").val();

    if((user_identificacion != null && user_identificacion != "") &&
        (user_nombres != null && user_nombres != "") &&
        (user_apellidos != null && user_apellidos != "") &&
        (user_telefono != null && user_telefono != "") &&
        (user_departamento != null && user_departamento != "") &&
        (user_municipio != null && user_municipio != "") &&
        (user_direccion != null && user_direccion != "") &&
        (user_estado != null && user_estado > -1)
    ){
        let emailRegex = /^(?:[^<>()[\].,;:\s@"]+(\.[^<>()[\].,;:\s@"]+)*|"[^\n"]+")@(?:[^<>()[\].,;:\s@"]+\.)+[^<>()[\]\.,;:\s@"]{2,63}$/i;

        if(emailRegex.test(user_correo)){

            if(user_correo.length < 64){

                let usernameRegex = /^[a-z\d]{2,64}$/i;

                if(usernameRegex.test(user_name) && user_name.length > 2 && user_name.length < 64){

                    if(user_password.length > 5){

                        if((user_password != null && user_password != "") && (user_password_rep != null && user_password_rep != "")){

                            if(user_password == user_password_rep){

                                let parametros = {
                                    "useridentificacion": user_identificacion,
                                    "usernombres": user_nombres,
                                    "userapellidos": user_apellidos,
                                    "usercorreo": user_correo,
                                    "usertelefono": user_telefono,
                                    "userdepartamento": user_departamento,
                                    "usermunicipio": user_municipio,
                                    "userdireccion": user_direccion,
                                    "userestado": user_estado,
                                    "username": user_name,
                                    "userpassword": user_password,
                                    "userpasswordrep": user_password_rep,
                                    "accion": option
                                }
                            
                                $.ajax({
                                    data:parametros,
                                    type:"POST",
                                    url: "../Services/user/APIuser.php",
                                    success: function(datos){
                                        let mensaje = datos.errors;
                                        if(mensaje != "" && mensaje != null){
                                            swal.fire({
                                                title: "Usuario registrado",
                                                text: mensaje,
                                                icon: "warning",
                                                buttons: true,
                                                confirmButtonText: "Aceptar"
                                            });  
                                        }
                                        else{
                                            clearmodal();
                                            table.ajax.reload();
                                            $('#add-user').modal('hide');
                                            swal.fire({
                                                title: "Registro exitoso",
                                                icon: "success",
                                                animation: true,
                                                showConfirmButton: false,
                                                timer: 2000
                                            });
                                        }
                                        datos.message;
                                    }
                                });      

                            }
                            else{
                                swal.fire({
                                    title: "Contraseñas no coinciden",
                                    text: "Por favor digitar contraseñas iguales",
                                    icon: "warning",
                                    buttons: true,
                                    confirmButtonText: "Aceptar"
                                });
                            }

                        }
                        else{
                            swal.fire({
                                title: "Por favor digite contraseñas",
                                text: "Por favor digitar contraseñas para validar usuario",
                                icon: "warning",
                                buttons: true,
                                confirmButtonText: "Aceptar"
                            });
                        }

                    }
                    else{
                        swal.fire({
                            title: "La contraseña no cumple las políticas",
                            text: "La contraseña debe tener mínimo 6 caracteres",
                            icon: "warning",
                            buttons: true,
                            confirmButtonText: "Aceptar"
                        });
                    }

                }
                else{
                    swal.fire({
                        title: "El usuario no cumple las políticas",
                        text: "El usuario debe contener numeros y letras mayor a 2 caracteres y menor a 64 caracteres",
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
            text: "Por favor completar los datos del usuario en el formulario",
            icon: "warning",
            buttons: true,
            confirmButtonText: "Aceptar"
        });
    }
}

function updateUser(table){
    let user_identificador = $("#useridedit").val();
    let user_identificacion = $("#useridentificacionedit").val();
    let user_nombres = $("#usernombresedit").val();
    let user_apellidos = $("#userapellidosedit").val();
    let user_correo = $("#usercorreoedit").val();
    let user_telefono = $("#usertelefonoedit").val();
    let user_departamento = $("#departamentosedit option:selected").val();
    let user_municipio = $("#municipiosedit option:selected").val();
    let user_direccion = $("#userdireccionedit").val();
    let user_estado = $("#userestadoedit option:selected").val();
    let optionupdate = $("button[id='userupdate']").val();

    if((user_identificacion !== null && user_identificacion !== "") &&
        (user_identificador !== null && user_identificador !== "") &&
        (user_nombres != null && user_nombres != "") &&
        (user_apellidos != null && user_apellidos != "") &&
        (user_telefono != null && user_telefono != "") &&
        (user_departamento != null && user_departamento != "") &&
        (user_municipio != null && user_municipio != "") &&
        (user_direccion != null && user_direccion != "") &&
        (user_estado != null && user_estado > -1)
    ){
        let emailRegex = /^(?:[^<>()[\].,;:\s@"]+(\.[^<>()[\].,;:\s@"]+)*|"[^\n"]+")@(?:[^<>()[\].,;:\s@"]+\.)+[^<>()[\]\.,;:\s@"]{2,63}$/i;

        if(emailRegex.test(user_correo)){

            if(user_correo.length < 64){

                let parametrosupdate = {
                    "useridentificador": user_identificador,
                    "useridentificacion": user_identificacion,
                    "usernombres": user_nombres,
                    "userapellidos": user_apellidos,
                    "usercorreo": user_correo,
                    "usertelefono": user_telefono,
                    "userdepartamento": user_departamento,
                    "usermunicipio": user_municipio,
                    "userdireccion": user_direccion,
                    "userestado": user_estado,
                    "accion": optionupdate
                }
            
                $.ajax({
                    data:parametrosupdate,
                    type:"POST",
                    url: "../Services/user/APIuser.php",
                    success: function(data){
                        let mensaje = data.errors;
                        if(mensaje != "" && mensaje != null){
                            swal.fire({
                                title: "Correo usuario registrado",
                                text: mensaje,
                                icon: "warning",
                                buttons: true,
                                confirmButtonText: "Aceptar"
                            });  
                        }
                        else{
                            table.ajax.reload();
                            $('#update-user').modal('hide');
                            swal.fire({
                                title: "Se actualizó usuario correctamente",
                                icon: "success",
                                animation: true,
                                showConfirmButton: false,
                                timer: 2000
                            });
                        }
                        datos.message;
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
            text: "Por favor completar los datos del usuario en el formulario",
            icon: "warning",
            buttons: true,
            confirmButtonText: "Aceptar"
        });
    }

}

function updateUserPassword(table){
    let user_identificador = $("#useridpasswordedit").val();
    let user_identificacion = $("#useridentificacionpasswordedit").val();
    let user_nombres = $("#usernombrespasswordedit").val();
    let user_apellidos = $("#userapellidospasswordedit").val();
    let user_correo = $("#usercorreopasswordedit").val();
    let user_telefono = $("#usertelefonopasswordedit").val();
    let user_departamento = $("#userdepartamentopasswordedit").val();
    let user_municipio = $("#usermunicipiopasswordedit").val();
    let user_direccion = $("#userdireccionpasswordedit").val();
    let user_estado = $("#userestadopasswordedit").val();
    let user_nombre = $("#usernameedit").val();
    let user_password = $("#userpasswordedit").val();
    let user_passwordrep = $("#userpasswordrepedit").val();
    let optionupdateuserpassword = $("button[id='userupdatepassword']").val();

    if((user_identificador !== null && user_identificador !== "") &&
        (user_nombre != null && user_nombre != "") &&
        (user_password != null && user_password != "") &&
        (user_passwordrep != null && user_passwordrep != "") 
    ){
        let usernameRegex = /^[a-z\d]{2,64}$/i;

        if(usernameRegex.test(user_nombre) && user_nombre.length > 2 && user_nombre.length < 64){

            if(user_password.length > 5){

                if(user_password == user_passwordrep){
                    let parametros = {
                        "useridentificador": user_identificador,
                        "useridentificacion": user_identificacion,
                        "usernombres": user_nombres,
                        "userapellidos": user_apellidos,
                        "usercorreo": user_correo,
                        "usertelefono": user_telefono,
                        "userdepartamento": user_departamento,
                        "usermunicipio": user_municipio,
                        "userdireccion": user_direccion,
                        "userestado": user_estado,
                        "username": user_nombre,
                        "userpassword": user_password,
                        "userpasswordrep": user_passwordrep,
                        "accion": optionupdateuserpassword
                    }
                    $.ajax({
                        data:parametros,
                        type:"POST",
                        url: "../Services/user/APIuser.php",
                        success: function(data){
                            let mensaje = data.errors;
                            console.table(mensaje);
                            if(mensaje != "" && mensaje != null){
                                swal.fire({
                                    title: "Nombre de usuario registrado",
                                    text: mensaje,
                                    icon: "warning",
                                    buttons: true,
                                    confirmButtonText: "Aceptar"
                                });  
                            }
                            else{
                                clearmodalupdateuserpassword();
                                $('#update-userpassword').modal('hide');
                                swal.fire({
                                    title: "Se actualizó contraseñas correctamente",
                                    icon: "success",
                                    animation: true,
                                    showConfirmButton: false,
                                    timer: 2000
                                });
                                table.ajax.reload();
                            }
                            datos.message;
                        }
                    });    
                }
                else{
                    swal.fire({
                        title: "Contraseñas no coinciden",
                        text: "Por favor digitar contraseñas iguales",
                        icon: "warning",
                        buttons: true,
                        confirmButtonText: "Aceptar"
                    });
                }
            }
            else{
                swal.fire({
                    title: "La contraseña no cumple las políticas",
                    text: "La contraseña debe tener mínimo 6 caracteres",
                    icon: "warning",
                    buttons: true,
                    confirmButtonText: "Aceptar"
                });
            }
        }
        else{
            swal.fire({
                title: "El usuario no cumple las políticas",
                text: "El usuario debe contener numeros y letras mayor a 2 caracteres y menor a 64 caracteres",
                icon: "warning",
                buttons: true,
                confirmButtonText: "Aceptar"
            });
        }

    }
    else{
        swal.fire({
            title: "Datos incompletos",
            text: "Por favor ingresar las contraseñas iguales y el nombre de usuario",
            icon: "warning",
            buttons: true,
            confirmButtonText: "Aceptar"
        });
    }
}