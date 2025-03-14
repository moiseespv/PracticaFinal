<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<!-- Header -->
<header class="bg-primary text-white text-center py-4 shadow">
    <h1 class="h2">Carrito de Compras</h1>
</header>

<!-- Main Content -->
<main class="d-flex flex-column align-items-center justify-content-center min-vh-100">
<div class="table-responsive">
        <table class="table table-striped table-hover table-bordered align-middle text-center">
            <thead class="table-dark">
                <tr>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($data)) : ?>
                    <?php foreach ($data as $producto) : ?>
                        <tr>
                            <td>
                                <img src="<?= isset($producto->foto) ? htmlspecialchars($producto->foto) : 'placeholder.jpg' ?>" class="img-fluid rounded" width="80" height="80" alt="Imagen de <?= isset($producto->nombre) ? htmlspecialchars($producto->nombre) : 'Producto' ?>">
                            </td>
                            <td><?= htmlspecialchars($producto->nombre) ?></td>
                            <td><?= htmlspecialchars($producto->descripcion) ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="3" class="text-muted text-center">No hay productos disponibles</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>   

<div class="bg-white p-4 rounded shadow-sm text-center" style="width: 22rem;">
        <img src="https://cdn-icons-png.flaticon.com/512/2038/2038854.png" alt="Carrito vacío" class="img-fluid mx-auto" style="width: 5rem;">
        <h2 class="h4 text-dark mt-4">Tu carrito está vacío</h2>
        <p class="text-muted mt-2">Explora nuestros productos y encuentra lo que necesitas.</p>
        <a href="index.php" class="btn btn-primary mt-4">Ver Productos</a>
    </div>
</main>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
