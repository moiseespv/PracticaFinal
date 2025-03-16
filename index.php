<?php

include_once ("controllers/productosController.php");
include_once ("controllers/usuariosController.php");



if (isset($_REQUEST['action']) && isset($_REQUEST['controller']) ){
    $act=$_REQUEST['action'];
    $cont=$_REQUEST['controller'];

    $controller=new $cont();
    // Si la acción es getProductsInfo y se pasa un idproducto
    if ($cont == "ProductosController" && $act == "getProductsId" && isset($_REQUEST['idproducto'])) {
        $id = $_REQUEST['idproducto']; // Capturar el ID del producto
        $controller->getProductsId($id); // Pasarlo correctamente al controlador
    } elseif ($cont == "ProductosController" && $act == "addToCarrito" && isset($_REQUEST['idproducto'])) {
        $id = $_REQUEST['idproducto'];
        $controller->addToCarrito($id);
    } elseif ($cont == "ProductosController" && $act == "removeProductFromCarrito" && isset($_REQUEST['idproducto'])) {
        $id = $_REQUEST['idproducto'];
        $controller->removeProductFromCarrito($id);
    }  elseif ($cont == "ProductosController" && $act == "eliminarProducto" && isset($_REQUEST['idproducto'])) {
        $id = $_REQUEST['idproducto'];
        $controller->eliminarProducto($id);
    }else {
        $controller->$act();
    }
} else{
        $controller = New ProductosController;
        $controller->getProducts();
    }

?>