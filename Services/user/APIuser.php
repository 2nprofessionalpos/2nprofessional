<?php
require_once("../../Config/config.php");
require_once(ROOT_PATH.ROOT_APP.CONTROLLER_PATH."ControllerUser.php");
require_once(ROOT_PATH.ROOT_APP.MODELS_VO_PATH."UserVO.php");
header('Content-type: application/json');

$jsondata = array();
$jsondataupdate = array();
$jsonupdateuserpassword = array();
$jsondatadelete = array();

    if(isset($_POST['accion']) && $_POST['accion'] == "create"){

        if(!empty($_POST['useridentificacion'])
			&& !empty($_POST['usernombres'])
			&& !empty($_POST['userapellidos'])
            && strlen($_POST['username']) <= 64
            && strlen($_POST['username']) >= 2
            && preg_match('/^[a-z\d]{2,64}$/i', $_POST['username'])
            && !empty($_POST['usercorreo'])
            && strlen($_POST['usercorreo']) <= 64
            && filter_var($_POST['usercorreo'], FILTER_VALIDATE_EMAIL)
            && !empty($_POST['userpassword'])
            && !empty($_POST['userpasswordrep'])
            && ($_POST['userpassword'] === $_POST['userpasswordrep'])
        ){
            $useridentificacion = $_POST['useridentificacion'];
            $usernombres = clearStringInput(strip_tags($_POST["usernombres"],ENT_QUOTES));
            $userapellidos = clearStringInput(strip_tags($_POST["userapellidos"],ENT_QUOTES));
            $usercorreo = clearStringInput(strip_tags($_POST["usercorreo"],ENT_QUOTES));
            $usertelefono = $_POST['usertelefono'];
            $userdepartamento = $_POST['userdepartamento'];
            $usermunicipio = $_POST['usermunicipio'];
            $userdireccion = $_POST['userdireccion'];
            $userestado = $_POST['userestado'];
            $username = clearStringInput(strip_tags($_POST["username"],ENT_QUOTES));
            $userpassword = $_POST["userpassword"];
            $user_password_hash = password_hash($userpassword, PASSWORD_DEFAULT);
            $userdateregister = date("Y-m-d H:i:s");

            $apiuser = new ControllerUser();
            $result_user_create = $apiuser->existsUser($username, $usercorreo);

            if ($result_user_create != null) {
                $jsondata['errors'] = "Se produjo un error , el nombre de usuario ó la dirección de correo electrónico se encuentrán registrado.";
            } else {
                $userVO = new UserVO();
                $userVO->setIdentificacion($useridentificacion);
                $userVO->setNombres($usernombres);
                $userVO->setApellidos($userapellidos);
                $userVO->setCorreo($usercorreo);
                $userVO->setTelefono($usertelefono);
                $userVO->setDepartamento($userdepartamento);
                $userVO->setMunicipio($usermunicipio);
                $userVO->setDireccion($userdireccion);
                $userVO->setEstado($userestado);
                $userVO->setNombreUsuario($username);
                $userVO->setClaveUsuario($user_password_hash);
                $userVO->setFechaRegistroUsuario($userdateregister);
                $apiuser->createUser($userVO);
                $jsondata['message'] = 'Se registró con éxito el usuario en la base de datos';
            }
            
            echo json_encode($jsondata);
            
        }
    }

    if(isset($_POST['accion']) && $_POST['accion'] == "update"){
        if(!empty($_POST['useridentificacion'])
            && !empty($_POST['useridentificador'])
			&& !empty($_POST['usernombres'])
			&& !empty($_POST['userapellidos'])
            && !empty($_POST['usercorreo'])
            && strlen($_POST['usercorreo']) <= 64
            && filter_var($_POST['usercorreo'], FILTER_VALIDATE_EMAIL)
        ){
            $useridentificador = $_POST['useridentificador'];
            $useridentificacion = $_POST['useridentificacion'];
            $usernombres = clearStringInput(strip_tags($_POST["usernombres"],ENT_QUOTES));
            $userapellidos = clearStringInput(strip_tags($_POST["userapellidos"],ENT_QUOTES));
            $usercorreo = clearStringInput(strip_tags($_POST["usercorreo"],ENT_QUOTES));
            $usertelefono = $_POST['usertelefono'];
            $userdepartamento = $_POST['userdepartamento'];
            $usermunicipio = $_POST['usermunicipio'];
            $userdireccion = $_POST['userdireccion'];
            $userestado = $_POST['userestado'];

            $apiuser = new ControllerUser();
            $resultUserVO = $apiuser->existsUserEmail($usercorreo);

            if ($resultUserVO != null) {

                if($resultUserVO->getCorreo() == $usercorreo && $resultUserVO->getIdentificador() == $useridentificador){
                    $userVO = new UserVO();
                    $userVO->setIdentificador($useridentificador);
                    $userVO->setIdentificacion($useridentificacion);
                    $userVO->setNombres($usernombres);
                    $userVO->setApellidos($userapellidos);
                    $userVO->setCorreo($usercorreo);
                    $userVO->setTelefono($usertelefono);
                    $userVO->setDepartamento($userdepartamento);
                    $userVO->setMunicipio($usermunicipio);
                    $userVO->setDireccion($userdireccion);
                    $userVO->setEstado($userestado);
                    $apiuser->updateUser($userVO);
                    $jsondataupdate['message'] = 'Se actualizó con éxito el usuario en la base de datos';
                }
                else{
                    $jsondataupdate['errors'] = "Se produjo un error, la dirección de correo electrónico se encuentra registrada.";
                }
            }
            else{
                $userVO = new UserVO();
                $userVO->setIdentificador($useridentificador);
                $userVO->setIdentificacion($useridentificacion);
                $userVO->setNombres($usernombres);
                $userVO->setApellidos($userapellidos);
                $userVO->setCorreo($usercorreo);
                $userVO->setTelefono($usertelefono);
                $userVO->setDepartamento($userdepartamento);
                $userVO->setMunicipio($usermunicipio);
                $userVO->setDireccion($userdireccion);
                $userVO->setEstado($userestado);
                $apiuser->updateUser($userVO);
            } 
            echo json_encode($jsondataupdate);
        }
    }

    if(isset($_POST['accion']) && $_POST['accion'] == "updatepassword"){
        if(!empty($_POST['username'])
            && strlen($_POST['username']) <= 64
            && strlen($_POST['username']) >= 2
            && preg_match('/^[a-z\d]{2,64}$/i', $_POST['username'])
            && !empty($_POST['userpassword'])
            && !empty($_POST['userpasswordrep'])
            && ($_POST['userpassword'] === $_POST['userpasswordrep'])
        ){
            $useridentificador = $_POST['useridentificador'];
            $useridentificacion = $_POST['useridentificacion'];
            $usernombres = clearStringInput(strip_tags($_POST["usernombres"],ENT_QUOTES));
            $userapellidos = clearStringInput(strip_tags($_POST["userapellidos"],ENT_QUOTES));
            $usercorreo = clearStringInput(strip_tags($_POST["usercorreo"],ENT_QUOTES));
            $usertelefono = $_POST['usertelefono'];
            $userdepartamento = $_POST['userdepartamento'];
            $usermunicipio = $_POST['usermunicipio'];
            $userdireccion = $_POST['userdireccion'];
            $userestado = $_POST['userestado'];
            $username = clearStringInput(strip_tags($_POST["username"],ENT_QUOTES));
            $userpassword = $_POST["userpassword"];
            $user_password_hash = password_hash($userpassword, PASSWORD_DEFAULT);

            $apiuser = new ControllerUser();
            $resultUserPassword = $apiuser->existsUserName($username);
            
            if($resultUserPassword != null){
                if($resultUserPassword->getNombreUsuario() == $username && $resultUserPassword->getIdentificador() == $useridentificador){
                    $userVO = new UserVO();
                    $userVO->setIdentificador($useridentificador);
                    $userVO->setIdentificacion($useridentificacion);
                    $userVO->setNombres($usernombres);
                    $userVO->setApellidos($userapellidos);
                    $userVO->setCorreo($usercorreo);
                    $userVO->setTelefono($usertelefono);
                    $userVO->setDepartamento($userdepartamento);
                    $userVO->setMunicipio($usermunicipio);
                    $userVO->setDireccion($userdireccion);
                    $userVO->setEstado($userestado);
                    $userVO->setNombreUsuario($username);
                    $userVO->setClaveUsuario($user_password_hash);
                    $apiuser->updateUserPassword($userVO);
                    $jsonupdateuserpassword['message'] = 'Se actualizó con éxito el usuario y clave de ingreso en la base de datos';
                }
                else{
                    $jsonupdateuserpassword['errors'] = "Se produjo un error, el nombre de usuario se encuentra registrado.";
                }
            }
            else{
                $userVO = new UserVO();
                $userVO->setIdentificador($useridentificador);
                $userVO->setIdentificacion($useridentificacion);
                $userVO->setNombres($usernombres);
                $userVO->setApellidos($userapellidos);
                $userVO->setCorreo($usercorreo);
                $userVO->setTelefono($usertelefono);
                $userVO->setDepartamento($userdepartamento);
                $userVO->setMunicipio($usermunicipio);
                $userVO->setDireccion($userdireccion);
                $userVO->setEstado($userestado);
                $userVO->setNombreUsuario($username);
                $userVO->setClaveUsuario($user_password_hash);
                $apiuser->updateUserPassword($userVO);
                $jsonupdateuserpassword['message'] = 'Se actualizó con éxito el usuario y clave de ingreso en la base de datos';
            }

            echo json_encode($jsonupdateuserpassword);

        }
    }


    if(isset($_POST['accion']) && $_POST['accion'] == "delete"){
        if(!empty($_POST['useridentificador'])){
            $useridentificador = $_POST['useridentificador'];
            $apiuser = new ControllerUser();
            $apiuser->deleteUser($useridentificador);
            $jsondatadelete['message'] = 'Se eliminó con éxito el usuario en la base de datos';
        }
        else{
            $jsondatadelete['errors']="Se produjo un error, No se puede eliminar el usuario verifique el sistema";
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