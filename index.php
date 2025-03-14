<?php
include_once ("views/header.php");
include ("./controllers/productosController.php");


//Punto de entrada a la aplicación. Si no se recibe parámetro action y controller en la url
//se muestra la página de inicio (texto HTML).
//En caso de que si se reciba, se instancia el controlador y se invoca la acción indicada.

if (isset($_REQUEST['action']) && isset($_REQUEST['controller']) ){
  $act=$_REQUEST['action'];
  $cont=$_REQUEST['controller'];

  $controller=new $cont();
  
  if ($cont == "ProductosController" && $act == "getProductsId" && isset($_REQUEST['idproducto'])) {
      $id = $_REQUEST['idproducto']; 
      $controller->getProductsId($id); 
  } elseif ($cont == "ProductosController" && $act == "addToCarrito" && isset($_REQUEST['idproducto'])) {
      $id = $_REQUEST['idproducto']; 
      $controller->addToCarrito($id); 
  } else {
      $controller->$act(); 
  }
} else{
      $controller = New ProductosController;
      $controller->getProducts();
  }

