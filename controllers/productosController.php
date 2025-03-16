<?php
session_start(); // Inicia o reanuda la sesión actual del usuario
include_once('./models/productosDAO.php'); 
include_once('./views/view.php'); 

class ProductosController
{
    // Método para obtener y mostrar todos los productos
    public function getProducts()
    {
        $productosDAO = new ProductosDAO(); // Crea un objeto para acceder a los datos de productos
        $productos = $productosDAO->getAllProducts(); // Obtiene todos los productos de la base de datos
        View::show('usu_listaproductos.php', $productos); // Muestra la vista de lista de productos con los datos obtenidos
    }

    // Método para obtener y mostrar información detallada de un producto específico
    public function getProductsId($id)
    {
        $productosDAO = new ProductosDAO(); // Crea un objeto para acceder a los datos de productos
        $producto = $productosDAO->getAllProductsId($id); // Obtiene los datos del producto con el ID especificado
        View::show('infoproductos.php', $producto); // Muestra la vista con la información detallada del producto
    }

    // Método para añadir un producto al carrito de compras
    public function addToCarrito($id)
    {
        if (!isset($_SESSION['carrito'])) {
            $_SESSION['carrito'] = []; // Si no existe el carrito en la sesión, lo crea como un array vacío
        }

        $productosDAO = new ProductosDAO(); // Crea un objeto para acceder a los datos de productos
        $productoSeleccionado = $productosDAO->getAllProductsId($id); // Obtiene el producto que se quiere añadir

        if (!empty($productoSeleccionado)) { // Si el producto existe
            $producto = $productoSeleccionado[0]; // Toma el primer resultado (debería ser único)
            $existeEnCarrito = false; // Variable para controlar si el producto ya está en el carrito

            // Comprueba si el producto ya está en el carrito
            foreach ($_SESSION['carrito'] as $item) {
                if ($item->id_producto == $producto->id_producto) {
                    $existeEnCarrito = true; // Marca que ya existe
                    break; // Sale del bucle
                }
            }

            // Solo añade el producto si no está ya en el carrito
            if (!$existeEnCarrito) {
                $_SESSION['carrito'][] = $producto; // Añade el producto al array del carrito
            }
        }

        header('Location: index.php'); // Redirige al usuario a la página principal
        exit(); // Termina la ejecución del script
    }

    // Método para mostrar el contenido del carrito
    public function showCarrito()
    {
        $productosCarrito = isset($_SESSION['carrito']) ? $_SESSION['carrito'] : []; // Obtiene los productos del carrito o un array vacío si no hay
        View::show('carrito.php', $productosCarrito); // Muestra la vista del carrito con los productos
    }

    // Método para listar productos en el panel de administración
    public function listarAdmin() {
        // Verifica si el usuario es administrador (perfil 2)
        if (!isset($_SESSION['usuario']) || $_SESSION['usuario']->perfil != 2) {
            header('Location: index.php'); // Si no es admin, redirige a la página principal
            exit(); // Termina la ejecución del script
        }
       
        $proDAO = new ProductosDAO(); // Crea un objeto para acceder a los datos de productos
        $array_productos = $proDAO->getAllProducts(); // Obtiene todos los productos
        View::show('admin_listaproductos.php', $array_productos); // Muestra la vista de admin con la lista de productos
    }
    
    // Método para mostrar el formulario de añadir nuevo producto (solo para admin)
    public function formNuevoProducto() {
        // Verifica si el usuario es administrador (perfil 2)
        if (!isset($_SESSION['usuario']) || $_SESSION['usuario']->perfil != 2) {
            header('Location: index.php'); // Si no es admin, redirige a la página principal
            exit(); // Termina la ejecución del script
        }
        
        View::show('addProduct.php'); // Muestra la vista del formulario para añadir producto
    }
    
    // Método para guardar un nuevo producto en la base de datos
    public function guardarProducto() {
        // Verifica si el usuario es administrador (perfil 2)
        if (!isset($_SESSION['usuario']) || $_SESSION['usuario']->perfil != 2) {
            header('Location: index.php'); // Si no es admin, redirige a la página principal
            exit(); // Termina la ejecución del script
        }
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') { // Verifica que se haya enviado el formulario por POST
            // Recoge los datos del formulario
            $nombre = $_POST['nombre'];
            $precio = $_POST['precio'];
            $descripcion = $_POST['descripcion'];
            $foto = $_POST['foto'];
            $descripcion2 = $_POST['descripcion2'];
            
            $proDAO = new ProductosDAO(); // Crea un objeto para acceder a los datos de productos
            $resultado = $proDAO->insertarProducto($nombre, $precio, $descripcion, $foto, $descripcion2); // Intenta insertar el producto
            
            // Guarda un mensaje según el resultado de la operación
            if ($resultado) {
                $_SESSION['mensaje'] = 'Producto añadido correctamente';
            } else {
                $_SESSION['mensaje'] = 'Error al añadir el producto';
            }
            
            header('Location: index.php?controller=ProductosController&action=adminListarProductos'); // Redirige a la lista de productos de admin
            exit(); // Termina la ejecución del script
        }
    }
}
?>