<?php
require_once("../../Config/config.php");
require_once(ROOT_PATH.ROOT_APP.MODELS_VO_PATH."DepartamentosVO.php");
require_once(ROOT_PATH.ROOT_APP.MODELS_CONECTION_PATH."connection.php");

class DepartamentosDAO{
    private $conn;
    public $stm;

    public function __construct(){
        $this->conn = new connection();
    }

    public function listDepartamentos(){
        $stm = null; 
        try 
        {
            $result = array();
            $query = "SELECT departamento_id, departamento_nombre FROM departamentos";
            $stm = $this->conn->db_open()->prepare($query);
            $stm->execute();
            $listDepartamentosVO = $stm->fetchAll(PDO::FETCH_OBJ);

            foreach($listDepartamentosVO as $r)
            {
                $departamentoVO = new DepartamentosVO();
                $departamentoVO->setDepartamentoId($r->departamento_id);
                $departamentoVO->setDepartamentoNombre($r->departamento_nombre);
                $result[] = $departamentoVO;
            }
            return $result;
            $stm = null;
        }catch (Exception $e) 
        {
            print_r($e->getMessage());
        }
    }

}
?>