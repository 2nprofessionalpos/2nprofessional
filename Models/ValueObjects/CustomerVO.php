<?php
require_once("PersonVO.php");

class CustomerVO extends PersonVO{
    private $nombre;
    private $establecimiento;
    private $responsable;
    private $fechaRegistro;

    public function __construct(){
    }

    //Functions Getter

    public function getNombre(){
        return $this->nombre;
    }

    public function getEstablecimiento(){
        return $this->establecimiento;
    }

    public function getResponsable(){
        return $this->responsable;
    }

    public function getFechaRegistro(){
        return $this->fechaRegistro;
    }

    //Functions Setter
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function setEstablecimiento($establecimiento){
        $this->establecimiento = $establecimiento;
    }

    public function setResponsable($responsable){
        $this->responsable = $responsable;
    }

    public function setFechaRegistro($fechaRegistro){
        $this->fechaRegistro = $fechaRegistro;
    }

}
?>