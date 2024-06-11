<?php
    require_once("../../Config/config.php");
    require_once(ROOT_PATH.ROOT_APP.MODELS_VO_PATH."ProductVO.php");
    require_once(ROOT_PATH.ROOT_APP.MODELS_DAO_PATH."ProductDAO.php");

    class ControllerProduct{
        //Atributo privado el que va invocar nuestra clase product
        private $product;
        
        public function __construct(){
            $this->product = new ProductDAO();
        }

        public function listProduct(){
            return $this->product->listProduct();
        }

        public function listProductOrderCodigo($cod){
            return $this->product->listProductOrderCodigo($cod);
        }

        public function listProductOrderNombre($nombre){
            return $this->product->listProductOrderNombre($nombre);
        }

        public function existsProductCodigo($productcodigo){
            return $this->product->existsProductCodigo($productcodigo);
        }

        public function existsProductCodigoBarras($productcodigobarras){
            return $this->product->existsProductCodigoBarras($productcodigobarras);
        }

        public function existsProductCodigoCodigoBarras($productcodigo, $productcodigobarras){
            return $this->product->existsProductCodigoCodigoBarras($productcodigo, $productcodigobarras);
        }

        public function createProduct($productVO){
            return $this->product->createProduct($productVO);
        }

        public function updateProduct($productVO){
            return $this->product->updateProduct($productVO);
        }

        public function deleteProduct($productid){
            return $this->product->deleteProduct($productid);
        }

    }

?>