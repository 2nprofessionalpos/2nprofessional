<?php
class PersonVO {
    private $identificador;
    private $identificacion;
    private $nombres;
    private $apellidos;  
    private $correo;
    private $telefono;
    private $departamento;
    private $nombredepartamento;
    private $municipio;
    private $nombremunicipio;
    private $direccion;
    private $estado;

    public function __construct(){
    }

    //Functions Getter

    public function getIdentificador(){
        return $this->identificador;
    }

    public function getIdentificacion(){
        return $this->identificacion;
    }

    public function getNombres(){
        return $this->nombres;
    }

    public function getApellidos(){
        return $this->apellidos;
    }

    public function getCorreo(){
        return $this->correo;
    }

    public function getTelefono(){
        return $this->telefono;
    }

    public function getDepartamento(){
        return $this->departamento;
    }

    public function getNombreDepartamento(){
        return $this->nombredepartamento;
    }

    public function getMunicipio(){
        return $this->municipio;
    }

    public function getNombreMunicipio(){
        return $this->nombremunicipio;
    }


    public function getDireccion(){
        return $this->direccion;
    }

    public function getEstado(){
        return $this->estado;
    }

    //Functions Setter

    public function setIdentificador($identificador){
        $this->identificador = $identificador;
    }

    public function setIdentificacion($identificacion){
        $this->identificacion = $identificacion;
    }

    public function setNombres($nombres){
        $this->nombres = $nombres;
    }

    public function setApellidos($apellidos){
        $this->apellidos = $apellidos;
    }

    public function setCorreo($correo){
        $this->correo = $correo;
    }

    public function setTelefono($telefono){
        $this->telefono = $telefono;
    }

    public function setDepartamento($departamento){
        $this->departamento = $departamento;
    }

    public function setNombreDepartamento($nombredepartamento){
        $this->nombredepartamento = $nombredepartamento;
    }

    public function setMunicipio($municipio){
        $this->municipio = $municipio;
    }

    public function setNombreMunicipio($nombremunicipio){
        $this->nombremunicipio = $nombremunicipio;
    }

    public function setDireccion($direccion){
        $this->direccion = $direccion;
    }

    public function setEstado($estado){
        $this->estado = $estado;
    }
}
?>