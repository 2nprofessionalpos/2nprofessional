<?php
    require_once("../../Config/config.php");
    require_once(ROOT_PATH.ROOT_APP.MODELS_VO_PATH."CustomerVO.php");
    require_once(ROOT_PATH.ROOT_APP.MODELS_DAO_PATH."CustomerDAO.php");

    class ControllerCustomer{
        //Atributo privado el que va invocar nuestra clase customer
        private $customer;
        
        public function __construct(){
            $this->customer = new CustomerDAO();
        }

        public function listCustomer(){
            return $this->customer->listCustomer();
        }

        public function listCustomerOrderNit($nit){
            return $this->customer->listCustomerOrderNit($nit);
        }

        public function listCustomerOrderNombre($nombre){
            return $this->customer->listCustomerOrderNombre($nombre);
        }

        public function existsCustomerIdentificacion($customeridentificacion){
            return $this->customer->existsCustomerIdentificacion($customeridentificacion);
        }

        public function existsCustomerEmail($customercorreo){
            return $this->customer->existsCustomerEmail($customercorreo);
        }

        public function existsCustomerIdentificacionEmail($customeridentificacion, $customercorreo){
            return $this->customer->existsCustomerIdentificacionEmail($customeridentificacion, $customercorreo);
        }

        public function createCustomer($customerVO){
            return $this->customer->createCustomer($customerVO);
        }

        public function updateCustomer($customerVO){
            return $this->customer->updateCustomer($customerVO);
        }

        public function deleteCustomer($customer_id){
            return $this->customer->deleteCustomer($customer_id);
        }

    }

?>