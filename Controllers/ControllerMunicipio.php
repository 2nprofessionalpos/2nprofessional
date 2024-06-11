<?php
    require_once("../../Config/config.php");
    require_once(ROOT_PATH.ROOT_APP.MODELS_VO_PATH."MunicipiosVO.php");
    require_once(ROOT_PATH.ROOT_APP.MODELS_DAO_PATH."MunicipiosDAO.php");

    class ControllerMunicipio{
        //Atributo privado el que va invocar nuestra clase municipio
        private $municipio;
        
        public function __construct(){
            $this->municipio = new MunicipiosDAO();
        }
        
        public function listMunicipios($departamento_id){
            return $this->municipio->listMunicipios($departamento_id);
        }
        
    }

?>