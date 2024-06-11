<?php
require_once("../../Config/config.php");
require_once(ROOT_PATH.ROOT_APP.CONTROLLER_PATH."ControllerProduct.php");
require_once(ROOT_PATH.ROOT_APP.MODELS_VO_PATH."ProductVO.php");
header('Content-type: application/json');

$jsondata = array();
$jsondataupdate = array();
$jsondatadelete = array();

    if(isset($_POST['accion']) && $_POST['accion'] == "create"){

        if(!empty($_POST['productcodigo'])
			&& !empty($_POST['productnombre'])
			&& !empty($_POST['productdetalle'])
            && !empty($_POST['productcodigobarras'])
            && isset($_POST['productestado'])
            && !empty($_POST['productiva'])
            && !empty($_POST['productvalor'])
        ){
            $productcodigo = clearStringInput(strip_tags($_POST["productcodigo"],ENT_QUOTES));
            $productnombre = $_POST['productnombre'];
            $productdetalle = $_POST['productdetalle'];
            $productcodigobarras = clearStringInput(strip_tags($_POST["productcodigobarras"],ENT_QUOTES));
            $productestado = $_POST['productestado'];
            $productiva = $_POST['productiva'];
            $productvalor = clearStringInput(strip_tags($_POST["productvalor"],ENT_QUOTES));
            $productdateregister = date("Y-m-d H:i:s");

            $apiproduct = new ControllerProduct();

            $result_product_create_codigo_codigobarras = $apiproduct->existsProductCodigoCodigoBarras($productcodigo, $productcodigobarras);
            $result_product_create_codigo = $apiproduct->existsProductCodigo($productcodigo);
            $result_product_create_codigobarras = $apiproduct->existsProductCodigoBarras($productcodigobarras);
            


            if ($result_product_create_codigo_codigobarras != null) {
                $jsondata['errorsone'] = "Se produjo un error, el codigo y el codigo de barras del producto se encuentrán registrados.";
            }
            else if(($result_product_create_codigo != null) && ($result_product_create_codigobarras != null)){
                $jsondata['errorsone'] = "Se produjo un error, el codigo y el codigo de barras del producto se encuentrán registrados.";
            }else if($result_product_create_codigo != null){
                $jsondata['errorstwo'] = "Se produjo un error, el código del producto se encuentra registrado.";
            }
            else if($result_product_create_codigobarras != null){
                $jsondata['errorsthree'] = "Se produjo un error, el codigo de barras del producto se encuentra registrado.";
            } else {
                $productVO = new ProductVO();
                $productVO->setCodigoProducto($productcodigo);
                $productVO->setNombreProducto($productnombre);
                $productVO->setDetalleProducto($productdetalle);
                $productVO->setCodigoBarrasProducto($productcodigobarras);
                $productVO->setEstadoProducto($productestado);
                $productVO->setIvaProducto($productiva);
                $productVO->setPrecioProducto($productvalor);
                $productVO->setFechaRegistroProducto($productdateregister);
                $apiproduct->createProduct($productVO);
            }
            echo json_encode($jsondata);
        }
    }

    if(isset($_POST['accion']) && $_POST['accion'] == "update"){

        if(!empty($_POST['productid'])
            && !empty($_POST['productcodigo'])
            && !empty($_POST['productnombre'])
            && !empty($_POST['productdetalle'])
            && !empty($_POST['productcodigobarras'])
            && isset($_POST['productestado'])
            && !empty($_POST['productiva'])
            && !empty($_POST['productvalor'])
        ){
            $productid = $_POST["productid"];
            $productcodigo = clearStringInput(strip_tags($_POST["productcodigo"],ENT_QUOTES));
            $productnombre = $_POST['productnombre'];
            $productdetalle = $_POST['productdetalle'];
            $productcodigobarras = $_POST["productcodigobarras"];
            $productestado = $_POST['productestado'];
            $productiva = $_POST['productiva'];
            $productvalor = clearStringInput(strip_tags($_POST["productvalor"],ENT_QUOTES));

            $apiproduct = new ControllerProduct();
            $result_product_update_codigo_codigobarras = $apiproduct->existsProductCodigoCodigoBarras($productcodigo, $productcodigobarras);
            $result_product_update_codigobarras = $apiproduct->existsProductCodigoBarras($productcodigobarras);
            $result_product_update_codigo = $apiproduct->existsProductCodigo($productcodigo);
            
            

            if ($result_product_update_codigo_codigobarras != null){

                if(($result_product_update_codigo_codigobarras->getCodigoProducto() == $productcodigo) &&
                    ($result_product_update_codigo_codigobarras->getCodigoBarrasProducto() == $productcodigobarras) &&
                    ($result_product_update_codigo_codigobarras->getIdProducto() == $productid)
                ){
                    $productVO = new ProductVO();
                    $productVO->setIdProducto($productid);
                    $productVO->setCodigoProducto($productcodigo);
                    $productVO->setNombreProducto($productnombre);
                    $productVO->setDetalleProducto($productdetalle);
                    $productVO->setCodigoBarrasProducto($productcodigobarras);
                    $productVO->setEstadoProducto($productestado);
                    $productVO->setIvaProducto($productiva);
                    $productVO->setPrecioProducto($productvalor);
                    $apiproduct->updateProduct($productVO);
                }
                else{
                    $jsondataupdate['errorsone'] = "Se produjo un error, el codigo y el codigo de barras del producto se encuentrán registrados.";
                }
                
            }
            else if(($result_product_update_codigo != null) && ($result_product_update_codigobarras != null)){

                if(($result_product_update_codigo->getCodigoProducto() == $productcodigo) &&
                    ($result_product_update_codigobarras->getCodigoBarrasProducto() == $productcodigobarras) &&
                    ($result_product_update_codigo->getIdProducto() != $productid) &&
                    ($result_product_update_codigobarras->getIdProducto() != $productid)
                ){
                    $jsondataupdate['errorsone'] = "Se produjo un error, el codigo y codigo de barras del producto se encuentrán registrados."; 
                }
                else if(($result_product_update_codigo->getCodigoProducto() == $productcodigo) &&
                    ($result_product_update_codigo->getIdProducto() != $productid)
                ){
                    $jsondataupdate['errorstwo'] = "Se produjo un error, el código del producto se encuentra registrado.";
                }
                else if(($result_product_update_codigobarras->getCodigoBarrasProducto() == $productcodigobarras) &&
                    ($result_product_update_codigobarras->getIdProducto() != $productid)
                ){
                    $jsondataupdate['errorsthree'] = "Se produjo un error, el codigo de barras del producto se encuentra registrado.";
                }

            } 
            else if($result_product_update_codigo != null){
                if(($result_product_update_codigo->getCodigoProducto() == $productcodigo) &&
                    ($result_product_update_codigo->getIdProducto() == $productid)
                ){
                    $productVO = new ProductVO();
                    $productVO->setIdProducto($productid);
                    $productVO->setCodigoProducto($productcodigo);
                    $productVO->setNombreProducto($productnombre);
                    $productVO->setDetalleProducto($productdetalle);
                    $productVO->setCodigoBarrasProducto($productcodigobarras);
                    $productVO->setEstadoProducto($productestado);
                    $productVO->setIvaProducto($productiva);
                    $productVO->setPrecioProducto($productvalor);
                    $apiproduct->updateProduct($productVO);
                }
                else{
                    $jsondataupdate['errorstwo'] = "Se produjo un error, el código del producto se encuentra registrado.";
                }
            }
            else if($result_product_update_codigobarras != null){
                if(($result_product_update_codigobarras->getCodigoBarrasProducto() == $productcodigobarras) &&
                    ($result_product_update_codigobarras->getIdProducto() == $productid)
                ){
                    $productVO = new ProductVO();
                    $productVO->setIdProducto($productid);
                    $productVO->setCodigoProducto($productcodigo);
                    $productVO->setNombreProducto($productnombre);
                    $productVO->setDetalleProducto($productdetalle);
                    $productVO->setCodigoBarrasProducto($productcodigobarras);
                    $productVO->setEstadoProducto($productestado);
                    $productVO->setIvaProducto($productiva);
                    $productVO->setPrecioProducto($productvalor);
                    $apiproduct->updateProduct($productVO);
                }
                else{
                    $jsondataupdate['errorsthree'] = "Se produjo un error, el codigo de barras del producto se encuentra registrado."; 
                }
            }
            else {
                    printf("valide todo 3");
                    $productVO = new ProductVO();
                    $productVO->setIdProducto($productid);
                    $productVO->setCodigoProducto($productcodigo);
                    $productVO->setNombreProducto($productnombre);
                    $productVO->setDetalleProducto($productdetalle);
                    $productVO->setCodigoBarrasProducto($productcodigobarras);
                    $productVO->setEstadoProducto($productestado);
                    $productVO->setIvaProducto($productiva);
                    $productVO->setPrecioProducto($productvalor);
                    $apiproduct->updateProduct($productVO);
            }
            echo json_encode($jsondataupdate);


        }
    }
    
    if(isset($_POST['accion']) && $_POST['accion'] == "delete"){

        if(!empty($_POST['productid'])){
            $productid = $_POST['productid'];
            $apiproduct = new ControllerProduct();
            $apiproduct->deleteProduct($productid);
        }
        else{
            $jsondatadelete['errors']="Se produjo un error, No se puede eliminar el producto verifique el sistema";
        }
        echo json_encode($jsondatadelete);
    }

    function clearStringInput($data){
        $cleardata = trim($data);
        $cleardata = stripslashes($data);
        $cleardata = htmlspecialchars($data);
        return $cleardata;
    }
?>