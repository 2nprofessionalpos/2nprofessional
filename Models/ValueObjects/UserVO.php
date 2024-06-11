<?php
require_once("PersonVO.php");

class UserVO extends PersonVO{

    private $nombre_usuario;
    private $clave_usuario;
    private $fechaRegistro_usuario;

    public function __construct(){
    }

    //Functions Getter

    public function getNombreUsuario(){
        return $this->nombre_usuario;
    }

    public function getClaveUsuario(){
        return $this->clave_usuario;
    }

    public function getFechaRegistroUsuario(){
        return $this->fechaRegistro_usuario;
    }

    //Functions Setter

    public function setNombreUsuario($nombre_usuario){
        $this->nombre_usuario = $nombre_usuario;
    }

    public function setClaveUsuario($clave_usuario){
        $this->clave_usuario = $clave_usuario;
    }

    public function setFechaRegistroUsuario($fechaRegistro_usuario){
        $this->fechaRegistro_usuario = $fechaRegistro_usuario;
    }

}
?>