<?php
class ProductVO {
    private $id_producto;
    private $codigo_producto;
    private $nombre_producto;  
    private $detalle_producto;
    private $codigo_barras_producto;
    private $estado_producto;
    private $iva_producto;
    private $precio_producto;
    private $fecharegistro_producto;

    public function __construct(){
    }

    //Functions Getter

    public function getIdProducto(){
        return $this->id_producto;
    }

    public function getCodigoProducto(){
        return $this->codigo_producto;
    }

    public function getNombreProducto(){
        return $this->nombre_producto;
    }

    public function getDetalleProducto(){
        return $this->detalle_producto;
    }

    public function getCodigoBarrasProducto(){
        return $this->codigo_barras_producto;
    }

    public function getEstadoProducto(){
        return $this->estado_producto;
    }

    public function getIvaProducto(){
        return $this->iva_producto;
    }

    public function getPrecioProducto(){
        return $this->precio_producto;
    }

    public function getFechaRegistroProducto(){
        return $this->fecharegistro_producto;
    }

    //Functions Setter

    public function setIdProducto($id_producto){
        $this->id_producto = $id_producto;
    }

    public function setCodigoProducto($codigo_producto){
        $this->codigo_producto = $codigo_producto;
    }

    public function setNombreProducto($nombre_producto){
        $this->nombre_producto = $nombre_producto;
    }

    public function setDetalleProducto($detalle_producto){
        $this->detalle_producto = $detalle_producto;
    }

    public function setCodigoBarrasProducto($codigo_barras_producto){
        $this->codigo_barras_producto = $codigo_barras_producto;
    }

    public function setEstadoProducto($estado_producto){
        $this->estado_producto = $estado_producto;
    }

    public function setIvaProducto($iva_producto){
        $this->iva_producto = $iva_producto;
    }

    public function setPrecioProducto($precio_producto){
        $this->precio_producto = $precio_producto;
    }

    public function setFechaRegistroProducto($fecharegistro_producto){
        $this->fecharegistro_producto = $fecharegistro_producto;
    }
}
?>