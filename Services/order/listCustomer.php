<?php
require_once("../../Config/config.php");
require_once(ROOT_PATH.ROOT_APP.CONTROLLER_PATH."ControllerCustomer.php");
require_once(ROOT_PATH.ROOT_APP.MODELS_VO_PATH."CustomerVO.php");
header('Content-type: application/json');

    $getcustomer = new controllerCustomer();

    $arreglo = array();
    $datatableNit = array();
    $datatableNombre = array();

    if(isset($_GET['search'])){

        $nvar = $_GET['search'];

        $datatableNit = $getcustomer->listCustomerOrderNit($nvar);
        $datatableNombre = $getcustomer->listCustomerOrderNombre($nvar);

        if($datatableNit != null){

            $elementos = array("customer_id"=>$datatableNit->getIdentificador(),
                                    "customer_nitid"=>$datatableNit->getIdentificacion(), 
                                    "customer_nombreestablecimiento"=>$datatableNit->getNombre()."-".$datatableNit->getEstablecimiento(),
                                    "customer_nombre"=>$datatableNit->getNombre(),
                                    "customer_establecimiento"=>$datatableNit->getEstablecimiento(),
                                    "customer_responsable"=>$datatableNit->getResponsable(),
                                    "customer_departamento"=>$datatableNit->getDepartamento(),
                                    "customer_nombredepartamento"=>$datatableNit->getNombreDepartamento(), 
                                    "customer_municipio"=>$datatableNit->getMunicipio(),
                                    "customer_nombremunicipio"=>$datatableNit->getNombreMunicipio(),  
                                    "customer_direccion"=>$datatableNit->getDireccion(), 
                                    "customer_telefono"=>$datatableNit->getTelefono(), 
                                    "customer_correo"=>$datatableNit->getCorreo()
                                );
            $arreglo[]=$elementos;
            $datosretornar = array("data"=>$arreglo);
            echo json_encode($datosretornar);

        }else if($datatableNombre != null){

            $elementos = array("customer_id"=>$datatableNombre->getIdentificador(),
                                "customer_nitid"=>$datatableNombre->getIdentificacion(), 
                                "customer_nombreestablecimiento"=>$datatableNombre->getNombre()."-".$datatableNombre->getEstablecimiento(),
                                "customer_nombre"=>$datatableNombre->getNombre(),
                                "customer_establecimiento"=>$datatableNombre->getEstablecimiento(),
                                "customer_responsable"=>$datatableNombre->getResponsable(),
                                "customer_departamento"=>$datatableNombre->getDepartamento(),
                                "customer_nombredepartamento"=>$datatableNombre->getNombreDepartamento(), 
                                "customer_municipio"=>$datatableNombre->getMunicipio(),
                                "customer_nombremunicipio"=>$datatableNombre->getNombreMunicipio(),  
                                "customer_direccion"=>$datatableNombre->getDireccion(), 
                                "customer_telefono"=>$datatableNombre->getTelefono(), 
                                "customer_correo"=>$datatableNombre->getCorreo()
                            );
            $arreglo[]=$elementos;
            $datosretornar = array("data"=>$arreglo);
            echo json_encode($datosretornar);
        }


        
        
    }

   
?>