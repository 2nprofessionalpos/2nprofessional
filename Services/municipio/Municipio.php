<?php
require_once("../../Config/config.php");
require_once(ROOT_PATH.ROOT_APP.CONTROLLER_PATH."ControllerMunicipio.php");
require_once(ROOT_PATH.ROOT_APP.MODELS_VO_PATH."MunicipiosVO.php");
header('Content-type: application/json');

    if(isset($_POST['departamentoid'])){

        $getmunicipios = new controllerMunicipio();
        $arreglo = array();
        $departamento_id = $_POST['departamentoid'];
        $regmunicipios = $getmunicipios->listMunicipios($departamento_id);
        
        foreach($regmunicipios as $r)
        {
            $elementos = array("municipio_id"=>$r->getMunicipioId(),
                            "municipio_nombre"=>$r->getMunicipioNombre()
                        );
            $arreglo[]=$elementos;
        }
        $datosretornar = array("data"=>$arreglo);
        echo json_encode($datosretornar);

    }

    
?>