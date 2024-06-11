<?php
class DepartamentosVO {
    private $departamentoid;
    private $departamentonombre;
    private $departamentocodigo;  

    public function __construct(){
    }

    //Functions Getter

    public function getDepartamentoId(){
        return $this->departamentoid;
    }

    public function getDepartamentoNombre(){
        return $this->departamentonombre;
    }

    public function getDepartamentoCodigo(){
        return $this->departamentocodigo;
    }

    //Functions Setter

    public function setDepartamentoId($departamentoid){
        $this->departamentoid = $departamentoid;
    }

    public function setDepartamentoNombre($departamentonombre){
        $this->departamentonombre = $departamentonombre;
    }

    public function setDepartamentoCodigo($departamentocodigo){
        $this->departamentocodigo = $departamentocodigo;
    }

}
?>