<?php
// Asegurar que $data está definido antes de usarlo
if (!isset($data)) {
    $data = [];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lista de Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-4">
    <h2 class="text-center mb-4">Información del producto</h2>

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
                                <img src="<?= htmlspecialchars($producto->foto) ?>" class="img-fluid rounded" width="80" height="80" alt="Imagen de <?= htmlspecialchars($producto->nombre) ?>">
                            </td>
                            <td><?= htmlspecialchars($producto->nombre) ?></td>
                            <td><?= htmlspecialchars($producto->descripcion2) ?></td>
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

    <div class="text-center mt-3">
        <a href="index.php" class="btn btn-primary">
            Listar Productos
        </a>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
