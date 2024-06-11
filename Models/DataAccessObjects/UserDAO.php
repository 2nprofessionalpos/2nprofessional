<?php
require_once("../../Config/config.php");
require_once(ROOT_PATH.ROOT_APP.MODELS_VO_PATH."UserVO.php");
require_once(ROOT_PATH.ROOT_APP.MODELS_CONECTION_PATH."connection.php");

class UserDAO{
    private $conn;
    public $stm;

    public function __construct(){
        $this->conn = new connection();
    }

    public function authenticationUser($username){
        $stm = null;
        try{
            $query = "SELECT user_identificacion, user_nombres, user_apellidos, user_correo, user_telefono, user_departamento, user_municipio, user_direccion, user_estado, user_nombre, user_password, user_register FROM users WHERE user_nombre = ? OR user_correo = ?";
            $stm = $this->conn->db_open()->prepare($query);
            $stm->bindValue(1, $username);
            $stm->bindValue(2, $username);
            $stm->execute();
            $r = $stm->fetch(PDO::FETCH_OBJ);
            $userVO = new userVO();

            if($stm->rowCount()!=0 && $stm->rowCount()>0){
                $userVO->setIdentificacion($r->user_identificacion);
                $userVO->setNombres($r->user_nombres);
                $userVO->setApellidos($r->user_apellidos);
                $userVO->setCorreo($r->user_correo);
                $userVO->setTelefono($r->user_telefono);
                $userVO->setDepartamento($r->user_departamento);
                $userVO->setMunicipio($r->user_municipio);
                $userVO->setDireccion($r->user_direccion);
                $userVO->setEstado($r->user_estado);
                $userVO->setNombreUsuario($r->user_nombre);
                $userVO->setClaveUsuario($r->user_password);
                $userVO->setFechaRegistroUsuario($r->user_register);
            }
            else{
                $userVO = null;
            }

            return $userVO;

            $stm = null;

        }catch (Exception $e) 
        {
            print_r($e->getMessage());
        } 
    }

    public function existsUser($username, $usercorreo){
        $stm = null;
        try{
            $query = "SELECT * FROM users WHERE user_nombre = ? OR user_correo = ?";
            $stm = $this->conn->db_open()->prepare($query);
            $stm->bindValue(1, $username);
            $stm->bindValue(2, $usercorreo);
            $stm->execute();
            $r = $stm->fetch(PDO::FETCH_OBJ);
            $userVO = new userVO();

            if($stm->rowCount()!=0 && $stm->rowCount()>0){
                $userVO->setIdentificador($r->user_id);
                $userVO->setIdentificacion($r->user_identificacion);
                $userVO->setNombres($r->user_nombres);
                $userVO->setApellidos($r->user_apellidos);
                $userVO->setCorreo($r->user_correo);
                $userVO->setTelefono($r->user_telefono);
                $userVO->setDepartamento($r->user_departamento);
                $userVO->setMunicipio($r->user_municipio);
                $userVO->setDireccion($r->user_direccion);
                $userVO->setEstado($r->user_estado);
                $userVO->setNombreUsuario($r->user_nombre);
                $userVO->setClaveUsuario($r->user_password);
                $userVO->setFechaRegistroUsuario($r->user_register);
            }
            else{
                $userVO = null;
            }

            return $userVO;

            $stm = null;

        }catch (Exception $e) 
        {
            print_r($e->getMessage());
        } 
    }

    public function existsUserEmail($usercorreo){
        $stm = null;
        try{
            $query = "SELECT * FROM users WHERE user_correo = ?";
            $stm = $this->conn->db_open()->prepare($query);
            $stm->bindValue(1, $usercorreo);
            $stm->execute();
            $r = $stm->fetch(PDO::FETCH_OBJ);
            $userVO = new userVO();

            if($stm->rowCount()!=0 && $stm->rowCount()>0){
                $userVO->setIdentificador($r->user_id);
                $userVO->setIdentificacion($r->user_identificacion);
                $userVO->setNombres($r->user_nombres);
                $userVO->setApellidos($r->user_apellidos);
                $userVO->setCorreo($r->user_correo);
                $userVO->setTelefono($r->user_telefono);
                $userVO->setDepartamento($r->user_departamento);
                $userVO->setMunicipio($r->user_municipio);
                $userVO->setDireccion($r->user_direccion);
                $userVO->setEstado($r->user_estado);
            }
            else{
                $userVO = null;
            }

            return $userVO;

            $stm = null;

        }catch (Exception $e) 
        {
            print_r($e->getMessage());
        } 
    }

    public function existsUserName($username){
        $stm = null;
        try{
            $query = "SELECT * FROM users WHERE user_nombre = ?";
            $stm = $this->conn->db_open()->prepare($query);
            $stm->bindValue(1, $username);
            $stm->execute();
            $r = $stm->fetch(PDO::FETCH_OBJ);
            $userVO = new userVO();

            if($stm->rowCount()!=0 && $stm->rowCount()>0){
                $userVO->setIdentificador($r->user_id);
                $userVO->setIdentificacion($r->user_identificacion);
                $userVO->setNombres($r->user_nombres);
                $userVO->setApellidos($r->user_apellidos);
                $userVO->setCorreo($r->user_correo);
                $userVO->setTelefono($r->user_telefono);
                $userVO->setDepartamento($r->user_departamento);
                $userVO->setMunicipio($r->user_municipio);
                $userVO->setDireccion($r->user_direccion);
                $userVO->setEstado($r->user_estado);
            }
            else{
                $userVO = null;
            }

            return $userVO;

            $stm = null;

        }catch (Exception $e) 
        {
            print_r($e->getMessage());
        } 
    }

    public function createUser(UserVO $userVO){ 
        $stm = null;   
        try 
        {
            if($userVO != null){
                $identificacion = $userVO->getIdentificacion();
                $nombres = $userVO->getNombres(); 
                $apellidos = $userVO->getApellidos();
                $correo = $userVO->getCorreo(); 
                $telefono = $userVO->getTelefono();
                $departamento = $userVO->getDepartamento();
                $municipio = $userVO->getMunicipio();
                $direccion = $userVO->getDireccion();
                $estado = $userVO->getEstado();
                $nombre_usuario = $userVO->getNombreUsuario();
                $clave_usuario = $userVO->getClaveUsuario();
                $fechaRegistro_usuario = $userVO->getFechaRegistroUsuario();
                $query = "INSERT INTO users(user_identificacion, user_nombres, user_apellidos, user_correo, user_telefono, user_departamento, user_municipio, user_direccion, user_estado, user_nombre, user_password, user_register) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
                $stm = $this->conn->db_open()->prepare($query);    
                $stm->bindParam(1, $identificacion);   
                $stm->bindParam(2, $nombres);  
                $stm->bindParam(3, $apellidos);   
                $stm->bindParam(4, $correo);
                $stm->bindParam(5, $telefono);
                $stm->bindParam(6, $departamento);
                $stm->bindParam(7, $municipio);
                $stm->bindParam(8, $direccion);
                $stm->bindParam(9, $estado);
                $stm->bindParam(10, $nombre_usuario);
                $stm->bindParam(11, $clave_usuario);
                $stm->bindParam(12, $fechaRegistro_usuario);
                $stm->execute();
            }
            $stm = null;
        }catch (Exception $e) 
        {
            print_r($e->getMessage());
        }
    }

    public function listUser(){ 
        $stm = null; 
        try 
        {
            $result = array();
            $query = "SELECT * FROM users";
            $stm = $this->conn->db_open()->prepare($query);
            $stm->execute();
            $listaUserVO = $stm->fetchAll(PDO::FETCH_OBJ);

            foreach($listaUserVO as $r)
            {
                $userVO = new UserVO();
                $userVO->setIdentificador($r->user_id);
                $userVO->setIdentificacion($r->user_identificacion);
                $userVO->setNombres($r->user_nombres);
                $userVO->setApellidos($r->user_apellidos);
                $userVO->setCorreo($r->user_correo);
                $userVO->setTelefono($r->user_telefono);
                $userVO->setDepartamento($r->user_departamento);
                $userVO->setMunicipio($r->user_municipio);
                $userVO->setDireccion($r->user_direccion);
                $userVO->setEstado($r->user_estado);
                $userVO->setNombreUsuario($r->user_nombre);
                $userVO->setClaveUsuario($r->user_password);
                $userVO->setFechaRegistroUsuario($r->user_register);
                $result[] = $userVO;
            }
            return $result;
            $stm = null;
        }catch (Exception $e) 
        {
            print_r($e->getMessage());
        }
    }

    public function listUserId($userid){
        $stm = null; 
        try 
        {
            $result = array();
            $query = "SELECT * FROM users WHERE user_id = ?";
            $stm = $this->conn->db_open()->prepare($query);
            $stm->bindValue(1, $userid);
            $stm->execute();
            $r = $stm->fetch(PDO::FETCH_OBJ);
            $userVO = new userVO();

            if($stm->rowCount()!=0 && $stm->rowCount()>0)
            {
                $userVO->setIdentificador($r->user_id);
                $userVO->setIdentificacion($r->user_identificacion);
                $userVO->setNombres($r->user_nombres);
                $userVO->setApellidos($r->user_apellidos);
                $userVO->setCorreo($r->user_correo);
                $userVO->setTelefono($r->user_telefono);
                $userVO->setDepartamento($r->user_departamento);
                $userVO->setMunicipio($r->user_municipio);
                $userVO->setDireccion($r->user_direccion);
                $userVO->setEstado($r->user_estado);
                $userVO->setNombreUsuario($r->user_nombre);
                $userVO->setClaveUsuario($r->user_password);
                $userVO->setFechaRegistroUsuario($r->user_register);
            }
            else{
                $userVO = null;
            }

            return $userVO;

            $stm = null;
            
        }catch (Exception $e) 
        {
            print_r($e->getMessage());
        }
    }

    public function updateUser(UserVO $userVO){
        $stm = null;   
        try 
        {
            if($userVO != null){
                $id = $userVO->getIdentificador();
                $identificacion = $userVO->getIdentificacion();
                $nombres = $userVO->getNombres(); 
                $apellidos = $userVO->getApellidos();
                $correo = $userVO->getCorreo(); 
                $telefono = $userVO->getTelefono();
                $departamento = $userVO->getDepartamento();
                $municipio = $userVO->getMunicipio();
                $direccion = $userVO->getDireccion();
                $estado = $userVO->getEstado();
                $query = "UPDATE users SET user_identificacion = ?, user_nombres = ?, user_apellidos = ?, user_correo = ?, user_telefono = ?, user_departamento = ?, user_municipio = ?, user_direccion = ?, user_estado = ? WHERE user_id=?";
                $stm = $this->conn->db_open()->prepare($query);    
                $stm->bindParam(1, $identificacion);   
                $stm->bindParam(2, $nombres);  
                $stm->bindParam(3, $apellidos);   
                $stm->bindParam(4, $correo);
                $stm->bindParam(5, $telefono);
                $stm->bindParam(6, $departamento);
                $stm->bindParam(7, $municipio);
                $stm->bindParam(8, $direccion);
                $stm->bindParam(9, $estado);
                $stm->bindParam(10, $id);
                $stm->execute();
            }
            $stm = null;
        }catch (Exception $e) 
        {
            print_r($e->getMessage());
        }
    }

    public function updateUserPassword(UserVO $userVO){
        $stm = null;   
        try 
        {
            if($userVO != null){
                $id = $userVO->getIdentificador();
                $identificacion = $userVO->getIdentificacion();
                $nombres = $userVO->getNombres(); 
                $apellidos = $userVO->getApellidos();
                $correo = $userVO->getCorreo(); 
                $telefono = $userVO->getTelefono();
                $departamento = $userVO->getDepartamento();
                $municipio = $userVO->getMunicipio();
                $direccion = $userVO->getDireccion();
                $estado = $userVO->getEstado();
                $usernombre = $userVO->getNombreUsuario();
                $userpassword = $userVO->getClaveUsuario();
                $query = "UPDATE users SET user_identificacion = ?, user_nombres = ?, user_apellidos = ?, user_correo = ?, user_telefono = ?, user_departamento = ?, user_municipio = ?, user_direccion = ?, user_estado = ?, user_nombre = ?, user_password = ? WHERE user_id = ?";
                $stm = $this->conn->db_open()->prepare($query);
                $stm->bindParam(1, $identificacion);   
                $stm->bindParam(2, $nombres);  
                $stm->bindParam(3, $apellidos);   
                $stm->bindParam(4, $correo);
                $stm->bindParam(5, $telefono);
                $stm->bindParam(6, $departamento);
                $stm->bindParam(7, $municipio);
                $stm->bindParam(8, $direccion);
                $stm->bindParam(9, $estado);    
                $stm->bindParam(10, $usernombre);   
                $stm->bindParam(11, $userpassword);  
                $stm->bindParam(12, $id);   
                $stm->execute();
            }
            $stm = null;
        }catch (Exception $e) 
        {
            print_r($e->getMessage());
        }
    }

    public function deleteUser($iduser){
        $stm = null;
        try 
        {
            $id = $iduser;
            $query = "DELETE FROM users WHERE user_id = ?";
            $stm = $this->conn->db_open()->prepare($query);
            $stm->bindParam(1, $id);                 
            $stm->execute();
            $stm = null;
        } catch (Exception $e) 
        {
            print_r($e->getMessage());
        }
    }

}

?>