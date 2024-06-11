<?php
    require_once("../../Config/config.php");
    require_once(ROOT_PATH.ROOT_APP.MODELS_VO_PATH."DepartamentosVO.php");
    require_once(ROOT_PATH.ROOT_APP.MODELS_DAO_PATH."DepartamentosDAO.php");

    class ControllerDepartamento{
        //Atributo privado el que va invocar nuestra clase departamneto
        private $departamento;
        
        public function __construct(){
            $this->departamento = new DepartamentosDAO();
        }
        
        public function listDepartamentos(){
            return $this->departamento->listDepartamentos();
        }
        
    }

?>