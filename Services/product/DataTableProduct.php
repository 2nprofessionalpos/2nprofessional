<?php
require_once("../../Config/config.php");
require_once(ROOT_PATH.ROOT_APP.CONTROLLER_PATH."ControllerProduct.php");
require_once(ROOT_PATH.ROOT_APP.MODELS_VO_PATH."ProductVO.php");
header('Content-type: application/json');

    $getproduct = new controllerProduct();

    $arreglo = array();
    $datatable = array();

    $datatable = $getproduct->listProduct();

    foreach($datatable as $r)
    {
        $estadoname = "";
        if($r->getEstadoProducto()>0){
            $estadoname = "Activo";
        }
        else{
            $estadoname = "Inactivo";
        }

        $porcentajeiva = $r->getIvaProducto()."%";
        $pesoprecio = "$ ".$r->getPrecioProducto()." COP";

        $elementos = array("product_id"=>$r->getIdProducto(),
                            "product_codigo"=>$r->getCodigoProducto(), 
                            "product_nombre"=>$r->getNombreProducto(),
                            "product_detalle"=>$r->getDetalleProducto(),
                            "product_codigobarras"=>$r->getCodigoBarrasProducto(),
                            "product_estado"=>$r->getEstadoProducto(),
                            "product_estado_nombre"=>$estadoname,   
                            "product_iva"=>$r->getIvaProducto(), 
                            "product_iva_nombre"=>$porcentajeiva,
                            "product_precio"=>$r->getPrecioProducto(),
                            "product_precio_pesos"=>$pesoprecio,
                            "product_fecharegistro"=>$r->getFechaRegistroProducto()
                        );
        $arreglo[]=$elementos;
    }

    $datosretornar = array("data"=>$arreglo);
    echo json_encode($datosretornar);
?>