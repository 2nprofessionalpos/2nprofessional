<?php
require_once("../../Config/config.php");
require_once(ROOT_PATH.ROOT_APP.MODELS_VO_PATH."CustomerVO.php");
require_once(ROOT_PATH.ROOT_APP.MODELS_CONECTION_PATH."connection.php");

class CustomerDAO{
    private $conn;
    public $stm;

    public function __construct(){
        $this->conn = new connection();
    }

    public function listCustomer(){
        $stm = null; 
        try 
        {
            $result = array();
            $query = "SELECT * FROM customers";
            $stm = $this->conn->db_open()->prepare($query);
            $stm->execute();
            $listaCustomerVO = $stm->fetchAll(PDO::FETCH_OBJ);

            foreach($listaCustomerVO as $r)
            {
                $customerVO = new CustomerVO();
                $customerVO->setIdentificador($r->customer_id);
                $customerVO->setIdentificacion($r->customer_nitid);
                $customerVO->setNombre($r->customer_nombre);
                $customerVO->setEstablecimiento($r->customer_establecimiento);
                $customerVO->setResponsable($r->customer_responsable);
                $customerVO->setDepartamento($r->customer_departamento);
                $customerVO->setMunicipio($r->customer_municipio);
                $customerVO->setDireccion($r->customer_direccion);
                $customerVO->setTelefono($r->customer_telefono);
                $customerVO->setCorreo($r->customer_correo);
                $customerVO->setFechaRegistro($r->customer_fecharegistro);
                $result[] = $customerVO;
            }
            return $result;
            $stm = null;
        }catch (Exception $e) 
        {
            print_r($e->getMessage());
        }
    }

    public function listCustomerOrderNit($nit){
        $stm = null;
        try{
            $query = "SELECT customers.customer_id, 
            customers.customer_nitid, customers.customer_nombre, 
            customers.customer_establecimiento, customers.customer_responsable, 
            customers.customer_departamento, departamentos.departamento_nombre, 
            customers.customer_municipio, municipios.municipio_nombre, 
            customers.customer_direccion, customers.customer_telefono, 
            customers.customer_correo 
            FROM customers INNER JOIN departamentos ON departamentos.departamento_id = customers.customer_departamento 
            INNER JOIN municipios ON municipios.municipio_id = customers.customer_municipio 
            WHERE customers.customer_nitid = ? LIMIT 0 ,50;";
            $stm = $this->conn->db_open()->prepare($query);
            $stm->bindValue(1, $nit);
            $stm->execute();
            $r = $stm->fetch(PDO::FETCH_OBJ);
            $customerVO = new CustomerVO();

            if($stm->rowCount()!=0 && $stm->rowCount()>0){
                $customerVO->setIdentificador($r->customer_id);
                $customerVO->setIdentificacion($r->customer_nitid);
                $customerVO->setNombre($r->customer_nombre);
                $customerVO->setEstablecimiento($r->customer_establecimiento);
                $customerVO->setResponsable($r->customer_responsable);
                $customerVO->setDepartamento($r->customer_departamento);
                $customerVO->setNombreDepartamento($r->departamento_nombre);
                $customerVO->setMunicipio($r->customer_municipio);
                $customerVO->setNombreMunicipio($r->municipio_nombre);
                $customerVO->setDireccion($r->customer_direccion);
                $customerVO->setTelefono($r->customer_telefono);
                $customerVO->setCorreo($r->customer_correo);
            }
            else{
                $customerVO = null;
            }

            return $customerVO;

            $stm = null;

        }catch (Exception $e) 
        {
            print_r($e->getMessage());
        } 
    }

    public function listCustomerOrderNombre($nombre){
        $stm = null;
        try{
            $query = "SELECT customers.customer_id, customers.customer_nitid, 
            customers.customer_nombre, customers.customer_establecimiento, 
            customers.customer_responsable, customers.customer_departamento, 
            departamentos.departamento_nombre, customers.customer_municipio, 
            municipios.municipio_nombre, customers.customer_direccion, 
            customers.customer_telefono, customers.customer_correo 
            FROM customers INNER JOIN departamentos ON departamentos.departamento_id = customers.customer_departamento 
            INNER JOIN municipios ON municipios.municipio_id = customers.customer_municipio 
            WHERE customers.customer_nombre LIKE :nombre LIMIT 0 ,50;";
            $nombre = "%".$nombre."%";
            $stm = $this->conn->db_open()->prepare($query);
            $stm->bindValue(':nombre', $nombre, PDO::PARAM_STR);
            $stm->execute();
            $r = $stm->fetch(PDO::FETCH_OBJ);
            $customerVO = new CustomerVO();

            if($stm->rowCount()!=0 && $stm->rowCount()>0){
                $customerVO->setIdentificador($r->customer_id);
                $customerVO->setIdentificacion($r->customer_nitid);
                $customerVO->setNombre($r->customer_nombre);
                $customerVO->setEstablecimiento($r->customer_establecimiento);
                $customerVO->setResponsable($r->customer_responsable);
                $customerVO->setDepartamento($r->customer_departamento);
                $customerVO->setNombreDepartamento($r->departamento_nombre);
                $customerVO->setMunicipio($r->customer_municipio);
                $customerVO->setNombreMunicipio($r->municipio_nombre);
                $customerVO->setDireccion($r->customer_direccion);
                $customerVO->setTelefono($r->customer_telefono);
                $customerVO->setCorreo($r->customer_correo);
            }
            else{
                $customerVO = null;
            }

            return $customerVO;

            $stm = null;

        }catch (Exception $e) 
        {
            print_r($e->getMessage());
        } 
    }

    public function existsCustomerIdentificacion($customeridentificacion){
        $stm = null;
        try{
            $query = "SELECT * FROM customers WHERE customer_nitid = ?";
            $stm = $this->conn->db_open()->prepare($query);
            $stm->bindValue(1, $customeridentificacion);
            $stm->execute();
            $r = $stm->fetch(PDO::FETCH_OBJ);
            $customerVO = new CustomerVO();

            if($stm->rowCount()!=0 && $stm->rowCount()>0){
                $customerVO->setIdentificador($r->customer_id);
                $customerVO->setIdentificacion($r->customer_nitid);
                $customerVO->setNombre($r->customer_nombre);
                $customerVO->setEstablecimiento($r->customer_establecimiento);
                $customerVO->setResponsable($r->customer_responsable);
                $customerVO->setDepartamento($r->customer_departamento);
                $customerVO->setMunicipio($r->customer_municipio);
                $customerVO->setDireccion($r->customer_direccion);
                $customerVO->setTelefono($r->customer_telefono);
                $customerVO->setCorreo($r->customer_correo);
                $customerVO->setFechaRegistro($r->customer_fecharegistro);
            }
            else{
                $customerVO = null;
            }

            return $customerVO;

            $stm = null;

        }catch (Exception $e) 
        {
            print_r($e->getMessage());
        } 
    }

    public function existsCustomerEmail($customercorreo){
        $stm = null;
        try{
            $query = "SELECT * FROM customers WHERE customer_correo = ?";
            $stm = $this->conn->db_open()->prepare($query);
            $stm->bindValue(1, $customercorreo);
            $stm->execute();
            $r = $stm->fetch(PDO::FETCH_OBJ);
            $customerVO = new CustomerVO();

            if($stm->rowCount()!=0 && $stm->rowCount()>0){
                $customerVO->setIdentificador($r->customer_id);
                $customerVO->setIdentificacion($r->customer_nitid);
                $customerVO->setNombre($r->customer_nombre);
                $customerVO->setEstablecimiento($r->customer_establecimiento);
                $customerVO->setResponsable($r->customer_responsable);
                $customerVO->setDepartamento($r->customer_departamento);
                $customerVO->setMunicipio($r->customer_municipio);
                $customerVO->setDireccion($r->customer_direccion);
                $customerVO->setTelefono($r->customer_telefono);
                $customerVO->setCorreo($r->customer_correo);
                $customerVO->setFechaRegistro($r->customer_fecharegistro);
            }
            else{
                $customerVO = null;
            }

            return $customerVO;

            $stm = null;

        }catch (Exception $e) 
        {
            print_r($e->getMessage());
        } 
    }

    public function existsCustomerIdentificacionEmail($customeridentificacion, $customercorreo){
        $stm = null;
        try{
            $query = "SELECT * FROM customers WHERE customer_nitid = ? AND customer_correo = ?";
            $stm = $this->conn->db_open()->prepare($query);
            $stm->bindValue(1, $customeridentificacion);
            $stm->bindValue(2, $customercorreo);
            $stm->execute();
            $r = $stm->fetch(PDO::FETCH_OBJ);
            $customerVO = new CustomerVO();

            if($stm->rowCount()!=0 && $stm->rowCount()>0){
                $customerVO->setIdentificador($r->customer_id);
                $customerVO->setIdentificacion($r->customer_nitid);
                $customerVO->setNombre($r->customer_nombre);
                $customerVO->setEstablecimiento($r->customer_establecimiento);
                $customerVO->setResponsable($r->customer_responsable);
                $customerVO->setDepartamento($r->customer_departamento);
                $customerVO->setMunicipio($r->customer_municipio);
                $customerVO->setDireccion($r->customer_direccion);
                $customerVO->setTelefono($r->customer_telefono);
                $customerVO->setCorreo($r->customer_correo);
                $customerVO->setFechaRegistro($r->customer_fecharegistro);
            }
            else{
                $customerVO = null;
            }

            return $customerVO;

            $stm = null;

        }catch (Exception $e) 
        {
            print_r($e->getMessage());
        } 
    }

    public function createCustomer(CustomerVO $customerVO){
        $stm = null;   
        try 
        {
            if($customerVO != null){
                $identificacion = $customerVO->getIdentificacion();
                $nombre = $customerVO->getNombre();
                $establecimiento = $customerVO->getEstablecimiento();
                $responsable = $customerVO->getResponsable();
                $departamento = $customerVO->getDepartamento();
                $municipio = $customerVO->getMunicipio();
                $direccion = $customerVO->getDireccion();
                $telefono = $customerVO->getTelefono();
                $correo = $customerVO->getCorreo();
                $fechaRegistro = $customerVO->getFechaRegistro();
                $query = "INSERT INTO customers(customer_nitid, customer_nombre, customer_establecimiento, customer_responsable, customer_departamento, customer_municipio, customer_direccion, customer_telefono, customer_correo, customer_fecharegistro) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $stm = $this->conn->db_open()->prepare($query);    
                $stm->bindParam(1, $identificacion);   
                $stm->bindParam(2, $nombre);  
                $stm->bindParam(3, $establecimiento);   
                $stm->bindParam(4, $responsable);
                $stm->bindParam(5, $departamento);
                $stm->bindParam(6, $municipio);
                $stm->bindParam(7, $direccion);
                $stm->bindParam(8, $telefono);
                $stm->bindParam(9, $correo);
                $stm->bindParam(10, $fechaRegistro);
                $stm->execute();
            }

        }catch (Exception $e) 
        {
            print_r($e->getMessage());
        }
    }

    public function updateCustomer(CustomerVO $customerVO){
        $stm = null;   
        try 
        {
            if($customerVO != null){
                $id = $customerVO->getIdentificador();
                $identificacion = $customerVO->getIdentificacion();
                $nombre = $customerVO->getNombre();
                $establecimiento = $customerVO->getEstablecimiento();
                $responsable = $customerVO->getResponsable();
                $departamento = $customerVO->getDepartamento();
                $municipio = $customerVO->getMunicipio();
                $direccion = $customerVO->getDireccion();
                $telefono = $customerVO->getTelefono();
                $correo = $customerVO->getCorreo();
                $query = "UPDATE customers SET customer_nitid = ?, customer_nombre = ?, customer_establecimiento = ?, customer_responsable = ?, customer_departamento = ?, customer_municipio = ?, customer_direccion = ?, customer_telefono = ?, customer_correo = ? WHERE customer_id = ?";
                $stm = $this->conn->db_open()->prepare($query);    
                $stm->bindParam(1, $identificacion);   
                $stm->bindParam(2, $nombre);  
                $stm->bindParam(3, $establecimiento);   
                $stm->bindParam(4, $responsable);
                $stm->bindParam(5, $departamento);
                $stm->bindParam(6, $municipio);
                $stm->bindParam(7, $direccion);
                $stm->bindParam(8, $telefono);
                $stm->bindParam(9, $correo);
                $stm->bindParam(10, $id);
                $stm->execute();
            }

        }catch (Exception $e) 
        {
            print_r($e->getMessage());
        }
    }

    public function deleteCustomer($idcustomer){
        $stm = null;
        try 
        {
            $id = $idcustomer;
            $query = "DELETE FROM customers WHERE customer_id = ?";
            $stm = $this->conn->db_open()->prepare($query);
            $stm->bindParam(1, $idcustomer);                 
            $stm->execute();
        } catch (Exception $e) 
        {
            print_r($e->getMessage());
        }
    }


}

?>