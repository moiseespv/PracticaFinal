<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CompEx</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>

<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
    <div class="container">
        <a class="navbar-brand fw-bold" href="index.php">CompEx</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a href="index.php?controller=UsuariosController&action=showAddUserForm" class="btn btn-primary">
                        <i class="bi bi-person"></i> Iniciar sesión
                    </a>
                </li>
                <li class="nav-item ms-2">
                    <a href="index.php?controller=ProductosController&action=addToCarrito&idproducto=" class="btn btn-outline-secondary">
                        <i class="bi bi-cart"></i> Carrito
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Contenido de la página -->
<div class="container mt-4">
    <h2 class="text-center">Bienvenido a CompEx</h2>
    <p class="text-center text-muted">Explora nuestros productos y encuentra lo que necesitas.</p>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
