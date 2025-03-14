<?php
include('./models/productosDAO.php');
include('./views/view.php');

class ProductosController
{
    
   
    
    public function addToCarrito($id)
{
    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = array();
    }
    array_push($_SESSION['carrito'], $id);

    View::show('carrito.php', $_SESSION['carrito']);
}


   


    public function getProducts()
    {

        $proDAO=new ProductosDAO();

        $array_productos=$proDAO->getAllProducts();
        
        View::show('listaproductos.php', $array_productos);
    }

    public function getProductsId($id)
    {

        $proDAO=new ProductosDAO();

        $array_productos_id=$proDAO->getAllProductsId($id);
        
        View::show('infoproductos.php', $array_productos_id);
    }
   
 

    

    
}





?>