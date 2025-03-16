<head>
    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <title>CompEx</title>

</head>

<body class="d-flex flex-column min-vh-100 bg-light">
   
    <header class="bg-primary py-2">
      
        <div class="container d-flex align-items-center justify-content-between">
    
            <?php if (!isset($_SESSION['usuario'])): ?>
                <!-- Si el usuario NO está logueado -->
                <!--Usuario no logeado-->
                <a href="index.php" class="text-white fw-bold fs-4 text-decoration-none">CompEx</a>
               
            <?php elseif ($_SESSION['usuario']->perfil == 2): ?>
                <!-- Si es un administrador (perfil 2) -->
                <!--Administrador-->
                <a href="index.php?controller=ProductosController&action=adminListarProductos" class="text-white fw-bold fs-4 text-decoration-none">CompEx</a>
               
            <?php else: ?>
                <!-- Si es un usuario normal -->
                <!--Usuario Normal-->
                <a href="index.php" class="text-white fw-bold fs-4 text-decoration-none">CompEx</a>
           
            <?php endif; ?>

            <div>
       
                <?php if (!isset($_SESSION['usuario'])): ?>
                    <!-- Si el usuario NO está logueado -->
                    <!-- Usuario no logueado -->
                    <a class="btn btn-warning text-dark me-2" href="index.php?controller=UsuariosController&action=IniciarSesion">Iniciar Sesión</a>
                    <!-- Botón amarillo para iniciar sesión -->
                    <a class="btn btn-outline-warning text-white" href="index.php?controller=ProductosController&action=showCarrito">
                        <i class="fas fa-shopping-cart"></i> Carrito
                    </a>
                    <!-- Botón con borde amarillo para el carrito -->
                <?php elseif ($_SESSION['usuario']->perfil == 2): ?>
                    <!-- Si es un administrador (perfil 2) -->
                    <!-- Administrador -->
                    <a class="btn btn-danger me-2" href="index.php?controller=UsuariosController&action=CerrarSesion">
                        <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
                    </a>
                    <!-- Botón rojo para cerrar sesión -->
                <?php else: ?>
                    <!-- Si es un usuario normal -->
                    <!-- Usuario normal -->
                    <a class="btn btn-danger me-2" href="index.php?controller=UsuariosController&action=CerrarSesion">
                        <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
                    </a>
                    <!-- Botón rojo para cerrar sesión -->
                    <a class="btn btn-warning text-dark" href="index.php?controller=ProductosController&action=showCarrito">
                        <i class="fas fa-shopping-cart"></i> Carrito
                    </a>
                    <!-- Botón amarillo para el carrito -->
                <?php endif; ?>
            </div>
        </div>
    </header>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Carga Bootstrap JS -->