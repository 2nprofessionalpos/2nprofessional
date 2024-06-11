$(document).ready(function(){

    let getDate = new Date();
    let getDateIso = new Date().toISOString().slice(0, 10)
    let getCurrentDateView = getDate.getDate()+'/'+( getDate.getMonth() + 1 )+'/'+getDate.getFullYear(); 
    let getCurrentDate = getDate.getDate() + '-' + ( getDate.getMonth() + 1 ) + '-' + getDate.getFullYear();
    let getCurrentHour = getDate.getHours() + ':' + getDate.getMinutes() + ':' + getDate.getSeconds();
    let getDateHour = getCurrentDate+' '+getCurrentHour;

    

    $('#currentDate').val(getCurrentDateView);

    $("#customernitid").autocomplete({
        source:function(request,response){
            $.ajax({
                url: "../Services/order/listCustomer.php",
                type:"GET",
                dataType:"JSON",
                data:{
                    search: request.term
                },                    
                success:function(data){
                    response($.map(data, function (item) {
                            $("#customernombre").prop('disabled', true);
                            $("#customerid").val(item.customer_id);
                            $("#customernitid").val(item.customer_nitid);
                            $("#customernombre").val(item.customer_nombre);
                            $("#customerestablecimiento").val(item.customer_establecimiento);
                            $("#customerresponsable").val(item.customer_responsable);
                            $("#customerdepartamento").val(item.customer_nombredepartamento);
                            $("#customermunicipio").val(item.customer_nombremunicipio);
                            $("#customerdireccion").val(item.customer_direccion);
                            $("#customertelefono").val(item.customer_telefono);
                            $("#customercorreo").val(item.customer_correo);
                    }))
                }
            });
        },
        minLength: 3,
        maxLength: 10
    });

    $("#customernombre").autocomplete({
        source:function(request, response){
            $.ajax({
                url: "../Services/order/listCustomer.php",
                type:"GET",
                dataType:"JSON",
                data:{
                    search: request.term
                },                    
                success:function(data){
                    response($.map(data, function (item) {
                        $("#customernitid").prop('disabled', true);
                        $("#customerid").val(item.customer_id);
                        $("#customernitid").val(item.customer_nitid);
                        $("#customernombre").val(item.customer_nombre);
                        $("#customerestablecimiento").val(item.customer_establecimiento);
                        $("#customerresponsable").val(item.customer_responsable);
                        $("#customerdepartamento").val(item.customer_nombredepartamento);
                        $("#customermunicipio").val(item.customer_nombremunicipio);
                        $("#customerdireccion").val(item.customer_direccion);
                        $("#customertelefono").val(item.customer_telefono);
                        $("#customercorreo").val(item.customer_correo);
                    }))
                }
            });
        },
        minLength: 5
    });

    $("#productcodigo").autocomplete({
        source:function(request,response){
            $.ajax({
                url: "../Services/order/listProduct.php",
                type:"GET",
                dataType:"JSON",
                data:{
                    searchproduct: request.term
                },                    
                success:function(data){
                    response($.map(data, function (item) {
                            $("#productid").val(item.product_id);
                            $("#productcodigo").val(item.product_codigo);
                            $("#productnombre").val(item.product_nombre);
                            $("#productiva").val(item.product_iva);
                            $("#productvalorunitario").val(item.product_precio);
                    }))
                }
            });
        },
        minLength: 3,
        maxLength: 10
    });


    $("#productnombre").autocomplete({
        source:function(request, response){
            $.ajax({
                url: "../Services/order/listProduct.php",
                type:"GET",
                dataType:"JSON",
                data:{
                    searchproduct: request.term
                },                    
                success:function(data){
                    response($.map(data, function (item) {
                        $("#productid").val(item.product_id);
                        $("#productcodigo").val(item.product_codigo);
                        $("#productnombre").val(item.product_nombre);
                        $("#productiva").val(item.product_iva);
                        $("#productprecio").val(item.product_precio);
                    }))
                }
            });
        },
        minLength: 5
    });


    $("#customernitid").on("keydown", function( event ) {
        if (event.keyCode== $.ui.keyCode.LEFT || 
            event.keyCode== $.ui.keyCode.RIGHT || 
            event.keyCode== $.ui.keyCode.UP || 
            event.keyCode== $.ui.keyCode.DOWN || 
            event.keyCode== $.ui.keyCode.DELETE || 
            event.keyCode== $.ui.keyCode.BACKSPACE )
        {
            clearInfoProductCodigo();
        }
        if (event.keyCode==$.ui.keyCode.DELETE){
            clearInfoCustomerNombre()
        }

    });	


    $("#customernombre").on("keydown", function( event ) {
        if (event.keyCode== $.ui.keyCode.LEFT || 
            event.keyCode== $.ui.keyCode.RIGHT || 
            event.keyCode== $.ui.keyCode.UP || 
            event.keyCode== $.ui.keyCode.DOWN || 
            event.keyCode== $.ui.keyCode.DELETE || 
            event.keyCode== $.ui.keyCode.BACKSPACE )
        {
            clearInfoCustomerNombre();
        }
        if (event.keyCode==$.ui.keyCode.DELETE){
            clearInfoCustomerNit()
        }

    });	

    $("#productcodigo").on("keydown", function( event ) {
        if (event.keyCode== $.ui.keyCode.LEFT || 
            event.keyCode== $.ui.keyCode.RIGHT || 
            event.keyCode== $.ui.keyCode.UP || 
            event.keyCode== $.ui.keyCode.DOWN || 
            event.keyCode== $.ui.keyCode.DELETE || 
            event.keyCode== $.ui.keyCode.BACKSPACE )
        {
            clearInfoProductCodigo();
        }
        if (event.keyCode==$.ui.keyCode.DELETE){
            clearInfoProductNombre()
        }

    });	

    $("#productnombre").on("keydown", function( event ) {
        if (event.keyCode== $.ui.keyCode.LEFT || 
            event.keyCode== $.ui.keyCode.RIGHT || 
            event.keyCode== $.ui.keyCode.UP || 
            event.keyCode== $.ui.keyCode.DOWN || 
            event.keyCode== $.ui.keyCode.DELETE || 
            event.keyCode== $.ui.keyCode.BACKSPACE )
        {
            clearInfoProductNombre();
        }
        if (event.keyCode==$.ui.keyCode.DELETE){
            clearInfoProductCodigo()
        }

    });	


});

function clearInfoCustomerNit(){
    $("#customernombre").prop('disabled', false);
    $("#customerid").val('');
    $("#customernombre").val('');
    $("#customerestablecimiento").val('');
    $("#customerresponsable").val('');
    $("#customerdepartamento").val('');
    $("#customermunicipio").val('');
    $("#customerdireccion").val('');
    $("#customertelefono").val('');
    $("#customercorreo").val('');
}

function clearInfoCustomerNombre(){
    $("#customernitid").prop('disabled', false);
    $("#customerid").val('');
    $("#customernitid").val('');
    $("#customernombre").val('');
    $("#customerestablecimiento").val('');
    $("#customerresponsable").val('');
    $("#customerdepartamento").val('');
    $("#customermunicipio").val('');
    $("#customerdireccion").val('');
    $("#customertelefono").val('');
    $("#customercorreo").val('');
}

function clearInfoProductCodigo(){
    $("#productid").val('');
    $("#productcodigo").val('');
    $("#productnombre").val('');
    $("#productcantidad").val('');
    $("#productiva").val('');
    $("#productprecio").val('');
    $("#productvalorunitario").val('');
    $("#productvalortotal").val('');
}

function clearInfoProductNombre(){
    $("#productid").val('');
    $("#productcodigo").val('');
    $("#productnombre").val('');
    $("#productcantidad").val('');
    $("#productiva").val('');
    $("#productprecio").val('');
    $("#productvalorunitario").val('');
    $("#productvalortotal").val('');
}


