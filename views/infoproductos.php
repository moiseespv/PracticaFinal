<?php
// Asegurar que $data está definido antes de usarlo para evitar errores si no se pasa información
if (!isset($data)) {
    $data = [];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detalles del Producto - CompEx</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>

<div class="container mt-5">
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none text-primary">Inicio</a></li>
            <li class="breadcrumb-item active" aria-current="page">Información del producto</li>
        </ol>
    </nav>

    <h2 class="text-primary mb-4">Información detallada del producto</h2>

    <?php if (!empty($data)) : ?>
        <?php foreach ($data as $producto) : ?>
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 mb-4 mb-md-0">
                            <div class="text-center bg-light p-3 rounded">
                                <img src="<?= htmlspecialchars($producto->foto) ?>" class="img-fluid" style="max-height: 300px;" alt="Imagen de <?= htmlspecialchars($producto->nombre) ?>">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h3 class="fw-bold mb-3"><?= htmlspecialchars($producto->nombre) ?></h3>
                            
                            <div class="mb-4">
                                <span class="badge bg-warning text-dark fs-6 px-3 py-2">En stock</span>
                            </div>
                            
                            <div class="fs-3 fw-bold text-warning mb-4">
                                <?= number_format($producto->precio, 2) ?>€
                                <span class="text-muted fs-6">IVA incluido</span>
                            </div>
                            
                            <p class="mb-4"><?= htmlspecialchars($producto->descripcion) ?></p>
                            
                            <div class="d-flex gap-2">
                                <a href="index.php?controller=ProductosController&action=addToCarrito&idproducto=<?= $producto->id_producto ?>" class="btn btn-warning text-dark btn-lg">
                                    <i class="fas fa-shopping-cart me-2"></i>Añadir al carrito
                                </a>
                                <a href="index.php" class="btn btn-outline-primary btn-lg">
                                    <i class="fas fa-arrow-left me-2"></i>Volver
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-primary text-white py-3">
                    <h4 class="mb-0">Especificaciones técnicas</h4>
                </div>
                <div class="card-body">
                    <div class="p-3">
                        <?= htmlspecialchars($producto->descripcion2) ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else : ?>
        <div class="alert alert-warning" role="alert">
            <i class="fas fa-exclamation-triangle me-2"></i>
            No se encontró información para este producto.
        </div>
        <div class="text-center mt-4">
            <a href="index.php" class="btn btn-primary">
                <i class="fas fa-arrow-left me-2"></i>Volver a la tienda
            </a>
        </div>
    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>