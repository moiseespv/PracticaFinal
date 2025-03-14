<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lista de Productos</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center mb-4">Lista de Productos</h2>

    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered align-middle text-center">
            <thead class="table-dark">
                <tr>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Más Información</th>
                    <th>Añadir al Carrito</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($data)) : ?>
                    <?php foreach ($data as $producto) : ?>
                        <tr>
                            <td>
                                <img src="<?= $producto->foto ?>" class="img-fluid rounded" width="80" height="80" alt="Imagen de <?= htmlspecialchars($producto->nombre) ?>">
                            </td>
                            <td><?= htmlspecialchars($producto->nombre) ?></td>
                            <td><?= htmlspecialchars($producto->descripcion) ?></td>
                            <td>
                                <a href="index.php?controller=ProductosController&action=getProductsId&idproducto=<?= $producto->id_producto ?>" class="btn btn-info btn-sm">
                                    <i class="bi bi-eye"></i> Ver Más
                                </a>
                            </td>
                            <td>
                                <a href="index.php?controller=ProductosController&action=addToCart&idproducto=<?= $producto->id_producto ?>" class="btn btn-success btn-sm d-inline-flex align-items-center">
                                    <i class="bi bi-cart-plus me-1"></i> Añadir
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="5" class="text-muted text-center">No hay productos disponibles</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Bootstrap JS (Opcional si necesitas interactividad) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
