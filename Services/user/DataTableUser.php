<?php
require_once("../../Config/config.php");
require_once(ROOT_PATH.ROOT_APP.CONTROLLER_PATH."ControllerUser.php");
require_once(ROOT_PATH.ROOT_APP.MODELS_VO_PATH."UserVO.php");
header('Content-type: application/json');

    $getperson = new controllerUser();

    $arreglo = array();
    $datatable = array();

    $datatable = $getperson->listUser();
    foreach($datatable as $r)
    {
        
        $elementos = array("user_id"=>$r->getIdentificador(),
                            "user_identificacion"=>$r->getIdentificacion(), 
                            "user_nombre_completo"=>$r->getNombres()." ".$r->getApellidos(),
                            "user_nombres"=>$r->getNombres(),
                            "user_apellidos"=>$r->getApellidos(),
                            "user_correo"=>$r->getCorreo(), 
                            "user_telefono"=>$r->getTelefono(), 
                            "user_departamento"=>$r->getDepartamento(), 
                            "user_municipio"=>$r->getMunicipio(), 
                            "user_direccion"=>$r->getDireccion(), 
                            "user_estado"=>$r->getEstado(),
                            "user_nombre"=>$r->getNombreUsuario(), 
                            "user_password"=>$r->getClaveUsuario(), 
                            "user_register"=>$r->getFechaRegistroUsuario()
                        );
        $arreglo[]=$elementos;
    }
    $datosretornar = array("data"=>$arreglo);
    echo json_encode($datosretornar);
?>