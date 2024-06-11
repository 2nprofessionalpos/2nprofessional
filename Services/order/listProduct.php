<?php
require_once("../../Config/config.php");
require_once(ROOT_PATH.ROOT_APP.CONTROLLER_PATH."ControllerProduct.php");
require_once(ROOT_PATH.ROOT_APP.MODELS_VO_PATH."ProductVO.php");
header('Content-type: application/json');

    $getproduct = new ControllerProduct();

    $arreglo = array();
    $datatableCodigo = array();
    $datatableNombre = array();

    if(isset($_GET['searchproduct'])){

        $nvar = $_GET['searchproduct'];

        $datatableCodigo = $getproduct->listProductOrderCodigo($nvar);
        $datatableNombre = $getproduct->listProductOrderNombre($nvar);

        if($datatableCodigo != null){

            $elementos = array("product_id"=>$datatableCodigo->getIdProducto(),
                                    "product_codigo"=>$datatableCodigo->getCodigoProducto(), 
                                    "product_nombre"=>$datatableCodigo->getNombreProducto(),
                                    "product_detalle"=>$datatableCodigo->getDetalleProducto(),
                                    "product_codigobarras"=>$datatableCodigo->getCodigoBarrasProducto(),
                                    "product_estado"=>$datatableCodigo->getEstadoProducto(),
                                    "product_iva"=>$datatableCodigo->getIvaProducto(),
                                    "product_precio"=>$datatableCodigo->getPrecioProducto()
                                );
            $arreglo[]=$elementos;

            echo json_encode($arreglo);

        }else if($datatableNombre != null){

            $elementos = array("product_id"=>$datatableNombre->getIdProducto(),
                                    "product_codigo"=>$datatableNombre->getCodigoProducto(), 
                                    "product_nombre"=>$datatableNombre->getNombreProducto(),
                                    "product_detalle"=>$datatableNombre->getDetalleProducto(),
                                    "product_codigobarras"=>$datatableNombre->getCodigoBarrasProducto(),
                                    "product_estado"=>$datatableNombre->getEstadoProducto(),
                                    "product_iva"=>$datatableNombre->getIvaProducto(),
                                    "product_precio"=>$datatableNombre->getPrecioProducto()
            );
            $arreglo[]=$elementos;
            
            echo json_encode($arreglo);
        }


        
        
    }

   
?>