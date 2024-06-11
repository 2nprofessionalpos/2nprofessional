<?php
require_once("../../Config/config.php");
require_once(ROOT_PATH.ROOT_APP.CONTROLLER_PATH."ControllerCustomer.php");
require_once(ROOT_PATH.ROOT_APP.MODELS_VO_PATH."CustomerVO.php");
header('Content-type: application/json');

$jsondata = array();
$jsondataupdate = array();
$jsondatadelete = array();

    if(isset($_POST['accion']) && $_POST['accion'] == "create"){

        if(!empty($_POST['customeridentificacion'])
			&& !empty($_POST['customernombre'])
			&& !empty($_POST['customerestablecimiento'])
            && !empty($_POST['customerresponsable'])
            && !empty($_POST['customerdepartamento'])
            && !empty($_POST['customermunicipio'])
            && !empty($_POST['customerdireccion'])
            && !empty($_POST['customertelefono'])
            && !empty($_POST['customercorreo'])
            && strlen($_POST['customercorreo']) <= 64
            && filter_var($_POST['customercorreo'], FILTER_VALIDATE_EMAIL)
        ){
            $customeridentificacion = $_POST['customeridentificacion'];
            $customernombre = $_POST['customernombre'];
            $customerestablecimiento = $_POST['customerestablecimiento'];
            $customerresponsable = $_POST['customerresponsable'];
            $customerdepartamento = $_POST['customerdepartamento'];
            $customermunicipio = $_POST['customermunicipio'];
            $customerdireccion = $_POST['customerdireccion'];
            $customertelefono = $_POST['customertelefono'];
            $customercorreo = $usercorreo = clearStringInput(strip_tags($_POST["customercorreo"],ENT_QUOTES));
            $customerdateregister = date("Y-m-d H:i:s");

            $apicustomer = new ControllerCustomer();
            $result_customer_create_identificacion = $apicustomer->existsCustomerIdentificacion($customeridentificacion);
            $result_customer_create_correo = $apicustomer->existsCustomerEmail($customercorreo);
            $result_customer_create_identificacion_correo = $apicustomer->existsCustomerIdentificacionEmail($customeridentificacion, $customercorreo);


            if ($result_customer_create_identificacion_correo != null) {
                $jsondata['errorsthree'] = "Se produjo un error , el nit o cédula y la dirección de correo electrónico se encuentrán registrados.";
            }
            else if(($result_customer_create_correo != null) && ($result_customer_create_identificacion != null)){
                $jsondata['errorsthree'] = "Se produjo un error , el nit o cédula y la dirección de correo electrónico se encuentrán registrados.";
            }
            else if($result_customer_create_correo != null){
                $jsondata['errorstwo'] = "Se produjo un error , la dirección de correo electrónico se encuentra registrada.";
            }
            else if($result_customer_create_identificacion != null){
                $jsondata['errorsone'] = "Se produjo un error , el nit o cédula del cliente se encuentra registrado.";
            } else {
                $customerVO = new CustomerVO();
                $customerVO->setIdentificacion($customeridentificacion);
                $customerVO->setNombre($customernombre);
                $customerVO->setEstablecimiento($customerestablecimiento);
                $customerVO->setResponsable($customerresponsable);
                $customerVO->setDepartamento($customerdepartamento);
                $customerVO->setMunicipio($customermunicipio);
                $customerVO->setDireccion($customerdireccion);
                $customerVO->setTelefono($customertelefono);
                $customerVO->setCorreo($customercorreo);
                $customerVO->setFechaRegistro($customerdateregister);
                $apicustomer->createCustomer($customerVO);
            }
            echo json_encode($jsondata);
        }
    }

    if(isset($_POST['accion']) && $_POST['accion'] == "update"){

        if(!empty($_POST['customeridentificador'])
            && !empty($_POST['customeridentificacion'])
			&& !empty($_POST['customernombre'])
			&& !empty($_POST['customerestablecimiento'])
            && !empty($_POST['customerresponsable'])
            && !empty($_POST['customerdepartamento'])
            && !empty($_POST['customermunicipio'])
            && !empty($_POST['customerdireccion'])
            && !empty($_POST['customertelefono'])
            && !empty($_POST['customercorreo'])
            && strlen($_POST['customercorreo']) <= 64
            && filter_var($_POST['customercorreo'], FILTER_VALIDATE_EMAIL)
        ){
            $customeridentificador = $_POST['customeridentificador'];
            $customeridentificacion = $_POST['customeridentificacion'];
            $customernombre = $_POST['customernombre'];
            $customerestablecimiento = $_POST['customerestablecimiento'];
            $customerresponsable = $_POST['customerresponsable'];
            $customerdepartamento = $_POST['customerdepartamento'];
            $customermunicipio = $_POST['customermunicipio'];
            $customerdireccion = $_POST['customerdireccion'];
            $customertelefono = $_POST['customertelefono'];
            $customercorreo = $usercorreo = clearStringInput(strip_tags($_POST["customercorreo"],ENT_QUOTES));


            $apicustomer = new ControllerCustomer();
            $result_update_identificacion_correo = $apicustomer->existsCustomerIdentificacionEmail($customeridentificacion, $customercorreo);
            $result_update_identificacion = $apicustomer->existsCustomerIdentificacion($customeridentificacion);
            $result_update_correo = $apicustomer->existsCustomerEmail($customercorreo);


            if ($result_update_identificacion_correo != null) {
                if(($result_update_identificacion_correo->getIdentificacion() == $customeridentificacion) &&
                    ($result_update_identificacion_correo->getCorreo() == $customercorreo) &&
                    ($result_update_identificacion_correo->getIdentificador() == $customeridentificador)
                ){
                    $customerVO = new CustomerVO();
                    $customerVO->setIdentificador($customeridentificador);
                    $customerVO->setIdentificacion($customeridentificacion);
                    $customerVO->setNombre($customernombre);
                    $customerVO->setEstablecimiento($customerestablecimiento);
                    $customerVO->setResponsable($customerresponsable);
                    $customerVO->setDepartamento($customerdepartamento);
                    $customerVO->setMunicipio($customermunicipio);
                    $customerVO->setDireccion($customerdireccion);
                    $customerVO->setTelefono($customertelefono);
                    $customerVO->setCorreo($customercorreo);
                    $apicustomer->updateCustomer($customerVO);
                }
                else{
                    $jsondataupdate['errorsthree'] = "Se produjo un error , el nit o cédula y la dirección de correo electrónico se encuentrán registrados.";
                }
            }else if($result_update_correo != null){
                if(($result_update_correo->getCorreo() == $customercorreo) &&
                    ($result_update_correo->getIdentificador() == $customeridentificador)
                ){
                    $customerVO = new CustomerVO();
                    $customerVO->setIdentificador($customeridentificador);
                    $customerVO->setIdentificacion($customeridentificacion);
                    $customerVO->setNombre($customernombre);
                    $customerVO->setEstablecimiento($customerestablecimiento);
                    $customerVO->setResponsable($customerresponsable);
                    $customerVO->setDepartamento($customerdepartamento);
                    $customerVO->setMunicipio($customermunicipio);
                    $customerVO->setDireccion($customerdireccion);
                    $customerVO->setTelefono($customertelefono);
                    $customerVO->setCorreo($customercorreo);
                    $apicustomer->updateCustomer($customerVO);
                }
                else{
                    $jsondataupdate['errorstwo'] = "Se produjo un error , la dirección de correo electrónico se encuentra registrada.";
                }
            }
            else if($result_update_identificacion != null){
                if(($result_update_identificacion->getIdentificacion() == $customeridentificacion) &&
                    ($result_update_identificacion->getIdentificador() == $customeridentificador)
                ){
                    $customerVO = new CustomerVO();
                    $customerVO->setIdentificador($customeridentificador);
                    $customerVO->setIdentificacion($customeridentificacion);
                    $customerVO->setNombre($customernombre);
                    $customerVO->setEstablecimiento($customerestablecimiento);
                    $customerVO->setResponsable($customerresponsable);
                    $customerVO->setDepartamento($customerdepartamento);
                    $customerVO->setMunicipio($customermunicipio);
                    $customerVO->setDireccion($customerdireccion);
                    $customerVO->setTelefono($customertelefono);
                    $customerVO->setCorreo($customercorreo);
                    $apicustomer->updateCustomer($customerVO);
                }
                else{
                    $jsondataupdate['errorsone'] = "Se produjo un error , el nit o cédula del cliente se encuentra registrado.";
                }
            }
            else if(($result_update_correo != null) && ($result_update_identificacion != null)){
                
                if(($result_update_correo->getCorreo() == $customercorreo) &&
                    ($result_update_identificacion->getIdentificacion() == $customeridentificacion) &&
                    ($result_update_identificacion->getIdentificador() != $customeridentificador) &&
                    ($result_update_correo->getIdentificador() != $customeridentificador)
                ){
                    $jsondataupdate['errorsthree'] = "Se produjo un error , el nit o cédula y la dirección de correo electrónico se encuentrán registrados.";
                }
                else if(($result_update_correo->getCorreo() == $customercorreo) &&
                    ($result_update_correo->getIdentificador() != $customeridentificador)){
                    $jsondataupdate['errorstwo'] = "Se produjo un error , la dirección de correo electrónico se encuentra registrada.";
                }
                else if(($result_update_identificacion->getIdentificacion() == $customeridentificacion) &&
                        ($result_update_identificacion->getIdentificador() != $customeridentificador)){
                        $jsondataupdate['errorsone'] = "Se produjo un error , el nit o cédula del cliente se encuentra registrado.";
                }
            }
            else {
                $customerVO = new CustomerVO();
                $customerVO->setIdentificador($customeridentificador);
                $customerVO->setIdentificacion($customeridentificacion);
                $customerVO->setNombre($customernombre);
                $customerVO->setEstablecimiento($customerestablecimiento);
                $customerVO->setResponsable($customerresponsable);
                $customerVO->setDepartamento($customerdepartamento);
                $customerVO->setMunicipio($customermunicipio);
                $customerVO->setDireccion($customerdireccion);
                $customerVO->setTelefono($customertelefono);
                $customerVO->setCorreo($customercorreo);
                $apicustomer->updateCustomer($customerVO);
            }
            echo json_encode($jsondataupdate);
        
        }
    
    }

    if(isset($_POST['accion']) && $_POST['accion'] == "delete"){
        if(!empty($_POST['customeridentificador'])){
            $customeridentificador = $_POST['customeridentificador'];
            $apicustomer = new ControllerCustomer();
            $apicustomer->deleteCustomer($customeridentificador);
        }
        else{
            $jsondatadelete['errors']="Se produjo un error, No se puede eliminar el cliente verifique el sistema";
        }
        echo json_encode($jsondatadelete);
    }
    

    function clearStringInput($data){
        $cleardata = trim($data);
        $cleardata = stripslashes($data);
        $cleardata = htmlspecialchars($data);
        return $cleardata;
    }
?>