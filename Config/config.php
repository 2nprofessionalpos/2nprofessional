<?php
    /**Configuración de la base de datos */
    define('BD_HOST','localhost');
    define('BD_USER','root');
    define('BD_PASSWORD','');
    define('BD_NAME','bd2nprofessional');
    define('BD_CHARSET','utf8');

    /**Configuración de rutas de la app */
    define('ROOT_APP', "app2NProfessional/");
    define('ROOT_PATH', $_SERVER['DOCUMENT_ROOT'].'/');
    define('CONTROLLER_PATH', 'Controllers/');
    define('MODELS_CONECTION_PATH', "Models/Connection/");
    define('MODELS_DAO_PATH', "Models/DataAccessObjects/");
    define('MODELS_VO_PATH', "Models/ValueObjects/");
    define('SERVICES_PATH', "Services/");
    define('VIEWS_PATH', "Views/");


?>