<?php
require_once("../../Config/config.php");
require_once(ROOT_PATH.ROOT_APP.CONTROLLER_PATH."ControllerUser.php");

class Login
{
    public $errors = array();
    public $messages = array();

    public function __construct()
    {
        if (isset($_GET["logout"])) {
            $this->doLogout();
        }
        elseif (isset($_POST["login"])) {
            $this->dologinWithPostData();
        }
    }

    public function clearStringInput($data){
        $cleardata = trim($data);
        $cleardata = stripslashes($data);
        $cleardata = htmlspecialchars($data);
        return $cleardata;
    }

    private function dologinWithPostData()
    {
        if(empty($_POST['username']) && empty($_POST['password'])) {
            $this->errors[] = "Por favor ingresa el nombre o correo y contraseña del usuario";
        } elseif (empty($_POST['username'])) {
            $this->errors[] = "Por favor ingresa el nombre o correo del usuario";
        } elseif (empty($_POST['password'])) {
            $this->errors[] = "Por favor ingresa la contraseña del usuario";
        } elseif (!empty($_POST['username']) && !empty($_POST['password'])) {
            $username = $this->clearStringInput($_POST['username']);
            $getuser = new ControllerUser();
            $result_user_login = $getuser->authenticationUser($username);

            if ($result_user_login != null) {
                
                if (password_verify($_POST['password'], $result_user_login->getClaveUsuario())) {
                    session_start();
                    $_SESSION['user_id'] = $result_user_login->getIdentificador();
                    $_SESSION['user_name'] = $result_user_login->getNombreUsuario();
                    $_SESSION['user_email'] = $result_user_login->getCorreo();
                    $_SESSION['user_login_status'] = 1;
                } else {
                    $this->errors[] = "Usuario y/o contraseña no coinciden.";
                }
            } else {
                $this->errors[] = "Usuario y/o contraseña no coinciden.";
            }
            
        }
    }


    public function doLogout()
    {
        $_SESSION = array();
        session_destroy();
        $this->messages[] = "Su sesión ha terminado";

    }


    public function isUserLoggedIn()
    {
        if (isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] == 1) {
            return true;
        }
        else{
            return false;
        }
    }
}
?>