<?php

include_once('./models/usuariosDAO.php');
include_once('./views/view.php'); 

class UsuariosController {

    // Método para mostrar el formulario de inicio de sesión
    public function IniciarSesion() {
        View::show('addUser.php'); // Muestra la vista del formulario de inicio de sesión
    }

    // Método para procesar el inicio de sesión
    public function UsuarioIniciado() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') { // Verifica que se haya enviado el formulario por POST
            // Recoge los datos del formulario
            $nombre = $_POST['usuario'];
            $password = $_POST['password'];
            
            $usuariosDAO = new UsuariosDAO(); // Crea un objeto para acceder a los datos de usuarios
            $usuario = $usuariosDAO->verificarUsuario($nombre, $password); // Verifica si las credenciales son correctas
            
            if ($usuario) { // Si el usuario existe y la contraseña es correcta
                // Guarda los datos del usuario en la sesión
                $_SESSION['usuario'] = $usuario;
                
                // Redirige según el tipo de usuario
                if ($usuario->perfil == 2) {
                    // Si es administrador (perfil 2), redirige al panel de administración
                    header('Location: index.php?controller=ProductosController&action=listarAdmin');
                } elseif ($usuario->perfil == 1) {
                    // Si es usuario normal (perfil 1), redirige a la página principal
                    header('Location: index.php');
                }
                exit(); // Termina la ejecución del script
            } else {
                // Si las credenciales son incorrectas, guarda un mensaje de error
                $_SESSION['error_login'] = "Usuario o contraseña incorrectos";
                // Redirige de vuelta al formulario de inicio de sesión
                header('Location: index.php?controller=UsuariosController&action=IniciarSesion');
                exit(); // Termina la ejecución del script
            }
        }
    }

    // Método para cerrar la sesión del usuario
    public function CerrarSesion() {
        $carrito = $_SESSION['carrito'] ?? []; // Guarda el contenido del carrito o un array vacío si no existe

        session_unset(); // Elimina todas las variables de sesión
        session_destroy(); // Destruye la sesión

        session_start(); // Inicia una nueva sesión
        $_SESSION['carrito'] = $carrito; // Restaura el carrito en la nueva sesión

        header('Location: index.php'); // Redirige a la página principal
        exit(); // Termina la ejecución del script
    }

    // Método para finalizar una compra
    public function FinalizarCompra() {
        if (!isset($_SESSION['usuario'])) { // Verifica si el usuario ha iniciado sesión
            // Si no ha iniciado sesión, guarda la acción a realizar después del login
            $_SESSION['redirect_after_login'] = 'FinalizarCompra';
            // Redirige al formulario de inicio de sesión
            header('Location: index.php?controller=UsuariosController&action=IniciarSesion');
            exit(); // Termina la ejecución del script
        }

        $_SESSION['carrito'] = []; // Vacía el carrito
        $_SESSION['mensaje'] = 'Compra realizada con éxito'; // Guarda un mensaje de éxito

        header('Location: index.php'); // Redirige a la página principal
        exit(); // Termina la ejecución del script
    }
}
?>