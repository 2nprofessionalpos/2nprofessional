$(document).ready(function() {

    $("#municipios").prop('disabled', true);

    $("#departamentos").change(function(e){
        e.preventDefault();
        let selectuno = $(this);
        let selectdos = $("#municipios");
        getMunicipios(selectuno, selectdos);
    });

 });

 function getMunicipios(selectuno, selectdos){
    if(selectuno.val() !== ""){
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
                    selectdos.append('<option value="' + r.municipio_id + '">' + r.municipio_nombre + '</option>');       
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
