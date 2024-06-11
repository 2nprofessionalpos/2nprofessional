<?php
require_once("../../Config/config.php");
require_once(ROOT_PATH.ROOT_APP.CONTROLLER_PATH."ControllerUser.php");
require_once(ROOT_PATH.ROOT_APP.MODELS_VO_PATH."UserVO.php");
header('Content-type: application/json');

    $getuser = new controllerUser();

    $arreglo = array();
    $registroUser = array();

    if(isset($_GET['search'])){

        $nvar = $_GET['search'];

        $registroUser = $getuser->listUserId($nvar);

        if($registroUser != null){

            $elementos = array("user_id"=>$registroUser->getIdentificador(),
                        "user_identificacion"=>$registroUser->getIdentificacion(), 
                        "user_nombre_completo"=>$registroUser->getNombres()." ".$registroUser->getApellidos(),
                        "user_nombres"=>$registroUser->getNombres(),
                        "user_apellidos"=>$registroUser->getApellidos(),
                        "user_correo"=>$registroUser->getCorreo(), 
                        "user_telefono"=>$registroUser->getTelefono(), 
                        "user_departamento"=>$registroUser->getDepartamento(), 
                        "user_municipio"=>$registroUser->getMunicipio(), 
                        "user_direccion"=>$registroUser->getDireccion(), 
                        "user_estado"=>$registroUser->getEstado(),
                        "user_nombre"=>$registroUser->getNombreUsuario(), 
                        "user_password"=>$registroUser->getClaveUsuario(), 
                        "user_register"=>$registroUser->getFechaRegistroUsuario()
            );
            
            $arreglo[]=$elementos;
            $datosretornar = array("data"=>$arreglo);
            echo json_encode($datosretornar);

        }
        
    }

   
?>