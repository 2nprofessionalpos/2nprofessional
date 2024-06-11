<?php
require_once("../../Config/config.php");
require_once(ROOT_PATH.ROOT_APP.CONTROLLER_PATH."ControllerCustomer.php");
require_once(ROOT_PATH.ROOT_APP.MODELS_VO_PATH."CustomerVO.php");
header('Content-type: application/json');

    $getcustomer = new controllerCustomer();

    $arreglo = array();
    $datatable = array();

    $datatable = $getcustomer->listCustomer();
    foreach($datatable as $r)
    {
        $elementos = array("customer_id"=>$r->getIdentificador(),
                            "customer_nitid"=>$r->getIdentificacion(), 
                            "customer_nombreestablecimiento"=>$r->getNombre()."-".$r->getEstablecimiento(),
                            "customer_nombre"=>$r->getNombre(),
                            "customer_establecimiento"=>$r->getEstablecimiento(),
                            "customer_responsable"=>$r->getResponsable(),
                            "customer_departamento"=>$r->getDepartamento(), 
                            "customer_municipio"=>$r->getMunicipio(), 
                            "customer_direccion"=>$r->getDireccion(), 
                            "customer_telefono"=>$r->getTelefono(), 
                            "customer_correo"=>$r->getCorreo(), 
                            "customer_fecharegistro"=>$r->getFechaRegistro()
                        );
        $arreglo[]=$elementos;
    }
    $datosretornar = array("data"=>$arreglo);
    echo json_encode($datosretornar);
?>