<?php
require_once("../../Config/config.php");
require_once(ROOT_PATH.ROOT_APP.MODELS_VO_PATH."ProductVO.php");
require_once(ROOT_PATH.ROOT_APP.MODELS_CONECTION_PATH."connection.php");

class ProductDAO{
    private $conn;
    public $stm;

    public function __construct(){
        $this->conn = new connection();
    }

    public function listProduct(){
        $stm = null; 
        try 
        {
            $result = array();
            $query = "SELECT * FROM products";
            $stm = $this->conn->db_open()->prepare($query);
            $stm->execute();
            $listaProductVO = $stm->fetchAll(PDO::FETCH_OBJ);

            foreach($listaProductVO as $r)
            {
                $productVO = new ProductVO();
                $productVO->setIdProducto($r->product_id);
                $productVO->setCodigoProducto($r->product_codigo);
                $productVO->setNombreProducto($r->product_nombre);
                $productVO->setDetalleProducto($r->product_detalle);
                $productVO->setCodigoBarrasProducto($r->product_codigobarras);
                $productVO->setEstadoProducto($r->product_estado);
                $productVO->setIvaProducto($r->product_iva);
                $productVO->setPrecioProducto($r->product_precio);
                $productVO->setFechaRegistroProducto($r->product_fecharegistro);
                $result[] = $productVO;
            }
            return $result;
            
            $stm = null;
        }catch (Exception $e) 
        {
            print_r($e->getMessage());
        }
    }

    public function listProductOrderCodigo($cod){
        $stm = null;
        try{
            $query = "SELECT * FROM products WHERE product_codigo = ? LIMIT 0 ,50;";
            $stm = $this->conn->db_open()->prepare($query);
            $stm->bindValue(1, $cod);
            $stm->execute();
            $r = $stm->fetch(PDO::FETCH_OBJ);
            $productVO = new ProductVO();

            if($stm->rowCount()!=0 && $stm->rowCount()>0){
                $productVO->setIdProducto($r->product_id);
                $productVO->setCodigoProducto($r->product_codigo);
                $productVO->setNombreProducto($r->product_nombre);
                $productVO->setDetalleProducto($r->product_detalle);
                $productVO->setCodigoBarrasProducto($r->product_codigobarras);
                $productVO->setEstadoProducto($r->product_estado);
                $productVO->setIvaProducto($r->product_iva);
                $productVO->setPrecioProducto($r->product_precio);
                $productVO->setFechaRegistroProducto($r->product_fecharegistro);
            }
            else{
                $productVO = null;
            }

            return $productVO;

            $stm = null;

        }catch (Exception $e) 
        {
            print_r($e->getMessage());
        } 
    }

    public function listProductOrderNombre($nombre){
        $stm = null;
        try{
            $query = "SELECT * FROM products WHERE product_nombre = ? LIMIT 0 ,50;";
            $stm = $this->conn->db_open()->prepare($query);
            $stm->bindValue(1, $nombre);
            $stm->execute();
            $r = $stm->fetch(PDO::FETCH_OBJ);
            $productVO = new ProductVO();

            if($stm->rowCount()!=0 && $stm->rowCount()>0){
                $productVO->setIdProducto($r->product_id);
                $productVO->setCodigoProducto($r->product_codigo);
                $productVO->setNombreProducto($r->product_nombre);
                $productVO->setDetalleProducto($r->product_detalle);
                $productVO->setCodigoBarrasProducto($r->product_codigobarras);
                $productVO->setEstadoProducto($r->product_estado);
                $productVO->setIvaProducto($r->product_iva);
                $productVO->setPrecioProducto($r->product_precio);
                $productVO->setFechaRegistroProducto($r->product_fecharegistro);
            }
            else{
                $productVO = null;
            }

            return $productVO;

            $stm = null;

        }catch (Exception $e) 
        {
            print_r($e->getMessage());
        } 
    }

    public function existsProductCodigo($productcodigo){
        $stm = null;
        try{
            $query = "SELECT * FROM products WHERE product_codigo = ?";
            $stm = $this->conn->db_open()->prepare($query);
            $stm->bindValue(1, $productcodigo);
            $stm->execute();
            $r = $stm->fetch(PDO::FETCH_OBJ);
            $productVO = new ProductVO();

            if($stm->rowCount()!=0 && $stm->rowCount()>0){
                $productVO = new ProductVO();
                $productVO->setIdProducto($r->product_id);
                $productVO->setCodigoProducto($r->product_codigo);
                $productVO->setNombreProducto($r->product_nombre);
                $productVO->setDetalleProducto($r->product_detalle);
                $productVO->setCodigoBarrasProducto($r->product_codigobarras);
                $productVO->setEstadoProducto($r->product_estado);
                $productVO->setIvaProducto($r->product_iva);
                $productVO->setPrecioProducto($r->product_precio);
                $productVO->setFechaRegistroProducto($r->product_fecharegistro);
            }
            else{
                $productVO = null;
            }

            return $productVO;

            $stm = null;

        }catch (Exception $e) 
        {
            print_r($e->getMessage());
        } 
    }

    public function existsProductCodigoBarras($productcodigobarras){
        $stm = null;
        try{
            $query = "SELECT * FROM products WHERE product_codigobarras = ?";
            $stm = $this->conn->db_open()->prepare($query);
            $stm->bindValue(1, $productcodigobarras);
            $stm->execute();
            $r = $stm->fetch(PDO::FETCH_OBJ);
            $productVO = new ProductVO();

            if($stm->rowCount()!=0 && $stm->rowCount()>0){
                $productVO = new ProductVO();
                $productVO->setIdProducto($r->product_id);
                $productVO->setCodigoProducto($r->product_codigo);
                $productVO->setNombreProducto($r->product_nombre);
                $productVO->setDetalleProducto($r->product_detalle);
                $productVO->setCodigoBarrasProducto($r->product_codigobarras);
                $productVO->setEstadoProducto($r->product_estado);
                $productVO->setIvaProducto($r->product_iva);
                $productVO->setPrecioProducto($r->product_precio);
                $productVO->setFechaRegistroProducto($r->product_fecharegistro);
            }
            else{
                $productVO = null;
            }

            return $productVO;

            $stm = null;

        }catch (Exception $e) 
        {
            print_r($e->getMessage());
        } 
    }

    public function existsProductCodigoCodigoBarras($productcodigo, $productcodigobarras){
        $stm = null;
        try{
            $query = "SELECT * FROM products WHERE product_codigo = ? AND product_codigobarras = ?";
            $stm = $this->conn->db_open()->prepare($query);
            $stm->bindValue(1, $productcodigo);
            $stm->bindValue(2, $productcodigobarras);
            $stm->execute();
            $r = $stm->fetch(PDO::FETCH_OBJ);
            $productVO = new ProductVO();

            if($stm->rowCount()!=0 && $stm->rowCount()>0){
                $productVO = new ProductVO();
                $productVO->setIdProducto($r->product_id);
                $productVO->setCodigoProducto($r->product_codigo);
                $productVO->setNombreProducto($r->product_nombre);
                $productVO->setDetalleProducto($r->product_detalle);
                $productVO->setCodigoBarrasProducto($r->product_codigobarras);
                $productVO->setEstadoProducto($r->product_estado);
                $productVO->setIvaProducto($r->product_iva);
                $productVO->setPrecioProducto($r->product_precio);
                $productVO->setFechaRegistroProducto($r->product_fecharegistro);
            }
            else{
                $productVO = null;
            }

            return $productVO;

            $stm = null;

        }catch (Exception $e) 
        {
            print_r($e->getMessage());
        } 
    }

    public function createProduct(ProductVO $productVO){
        $stm = null;   
        try 
        {
            if($productVO != null){
                $codigo = $productVO->getCodigoProducto();
                $nombre = $productVO->getNombreProducto();
                $detalle = $productVO->getDetalleProducto();
                $codigobarras = $productVO->getCodigoBarrasProducto();
                $estado = $productVO->getEstadoProducto();
                $iva = $productVO->getIvaProducto();
                $precio = $productVO->getPrecioProducto();
                $fechaRegistro = $productVO->getFechaRegistroProducto();
                $query = "INSERT INTO products(product_codigo, product_nombre, product_detalle, product_codigobarras, product_estado, product_iva, product_precio, product_fecharegistro) VALUES (?,?,?,?,?,?,?,?)";
                $stm = $this->conn->db_open()->prepare($query);    
                $stm->bindParam(1, $codigo);   
                $stm->bindParam(2, $nombre);  
                $stm->bindParam(3, $detalle);   
                $stm->bindParam(4, $codigobarras);
                $stm->bindParam(5, $estado);
                $stm->bindParam(6, $iva);
                $stm->bindParam(7, $precio);
                $stm->bindParam(8, $fechaRegistro);
                $stm->execute();
            }

        }catch (Exception $e) 
        {
            print_r($e->getMessage());
        }
    }

    public function updateProduct(ProductVO $productVO){
        $stm = null;   
        try 
        {
            if($productVO != null){
                $id = $productVO->getIdProducto();
                $codigo = $productVO->getCodigoProducto();
                $nombre = $productVO->getNombreProducto();
                $detalle = $productVO->getDetalleProducto();
                $codigobarras = $productVO->getCodigoBarrasProducto();
                $estado = $productVO->getEstadoProducto();
                $iva = $productVO->getIvaProducto();
                $precio = $productVO->getPrecioProducto();
                $query = "UPDATE products SET product_codigo = ?, product_nombre= ?, product_detalle = ?, product_codigobarras = ?, product_estado = ?, product_iva = ?, product_precio = ? WHERE product_id = ?";
                $stm = $this->conn->db_open()->prepare($query);    
                $stm->bindParam(1, $codigo);   
                $stm->bindParam(2, $nombre);  
                $stm->bindParam(3, $detalle);   
                $stm->bindParam(4, $codigobarras);
                $stm->bindParam(5, $estado);
                $stm->bindParam(6, $iva);
                $stm->bindParam(7, $precio);
                $stm->bindParam(8, $id);
                $stm->execute();
            }

        }catch (Exception $e) 
        {
            print_r($e->getMessage());
        }
    }

    public function deleteProduct($productid){
        $stm = null;
        try 
        {
            $id = $productid;
            $query = "DELETE FROM products WHERE product_id = ?";
            $stm = $this->conn->db_open()->prepare($query);
            $stm->bindParam(1, $id);                 
            $stm->execute();
        } catch (Exception $e) 
        {
            print_r($e->getMessage());
        }
    }


}
