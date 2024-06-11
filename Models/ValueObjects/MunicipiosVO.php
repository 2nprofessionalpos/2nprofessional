<?php
class MunicipiosVO {
    private $municipioid;
    private $departamentoid;
    private $municipiocodigo; 
    private $municipionombre; 

    public function __construct(){
    }

    //Functions Getter

    public function getMunicipioId(){
        return $this->municipioid;
    }

    public function getDepartamentoId(){
        return $this->departamentoid;
    }

    public function getMunicipioCodigo(){
        return $this->municipiocodigo;
    }

    public function getMunicipioNombre(){
        return $this->municipionombre;
    }

    //Functions Setter

    public function setMunicipioId($municipioid){
        $this->municipioid = $municipioid;
    }

    public function setDepartamentoId($departamentoid){
        $this->departamentoid = $departamentoid;
    }

    public function setMunicipioCodigo($municipiocodigo){
        $this->municipiocodigo = $municipiocodigo;
    }

    public function setMunicipioNombre($municipionombre){
        $this->municipionombre = $municipionombre;
    }

}
?>