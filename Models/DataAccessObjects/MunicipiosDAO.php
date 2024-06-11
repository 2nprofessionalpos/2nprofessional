<?php
require_once("../../Config/config.php");
require_once(ROOT_PATH.ROOT_APP.MODELS_VO_PATH."MunicipiosVO.php");
require_once(ROOT_PATH.ROOT_APP.MODELS_CONECTION_PATH."connection.php");

class MunicipiosDAO{
    private $conn;
    public $stm;

    public function __construct(){
        $this->conn = new connection();
    }

    public function listMunicipios($departamento_id){
        $stm = null; 
        try 
        {
            $result = array();
            $query = "SELECT municipios.municipio_id, municipios.municipio_nombre
            FROM departamentos
            INNER JOIN municipios ON municipios.departamento_id = departamentos.departamento_id
            WHERE departamentos.departamento_id = ?";
            $stm = $this->conn->db_open()->prepare($query);
            $stm->bindValue(1, $departamento_id);
            $stm->execute();
            $listMunicipiosVO = $stm->fetchAll(PDO::FETCH_OBJ);

            foreach($listMunicipiosVO as $r)
            {
                $municipioVO = new MunicipiosVO();
                $municipioVO->setMunicipioId($r->municipio_id);
                $municipioVO->setMunicipioNombre($r->municipio_nombre);
                $result[] = $municipioVO;
            }
            return $result;
            $stm = null;
        }catch (Exception $e) 
        {
            print_r($e->getMessage());
        }
    }

}