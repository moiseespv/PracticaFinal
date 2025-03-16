<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"> <
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lista de Productos</title> 
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>
<body>
<div class="container mt-4"> 
    <h2 class="text-center">Bienvenido a CompEx</h2> 
    <p class="text-center text-muted">Explora nuestros productos y encuentra lo que necesitas.</p> 
</div>
<div class="container mt-5"> 
    <h2 class="text-center mb-4">Lista de Productos</h2> 

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4"> 
         
        
        <?php if (!empty($data)) : ?> <!-- Comprueba si hay productos en la variable $data -->
            <?php foreach ($data as $producto) : ?> <!-- Recorre cada producto de la lista -->
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <div class="text-center p-3">
                            <img src="<?= $producto->foto ?>" class="img-fluid rounded" style="height: 150px; object-fit: contain;" alt="Imagen de <?= htmlspecialchars($producto->nombre) ?>">
                            <!-- Muestra la imagen del producto, la hace responsive, con altura fija y preservando su proporción -->
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($producto->nombre) ?></h5> <!-- Nombre del producto (con protección contra XSS) -->
                            <p class="card-text"><?= htmlspecialchars($producto->descripcion) ?></p> <!-- Descripción del producto (con protección contra XSS) -->
                        </div>
                        <div class="card-footer bg-white d-flex justify-content-between"> 
                            <a href="index.php?controller=ProductosController&action=getProductsId&idproducto=<?= $producto->id_producto ?>" class="btn btn-info btn-sm">
                                <i class="bi bi-eye"></i> Ver Más
                            </a> <!-- Botón azul para ver detalles del producto, usa el controlador para obtener un producto específico -->
                            
                            <a href="index.php?controller=ProductosController&action=addToCarrito&idproducto=<?= $producto->id_producto ?>" class="btn btn-success btn-sm d-inline-flex align-items-center">
                                <i class="bi bi-cart-plus me-1"></i> Añadir
                            </a> <!-- Botón verde para añadir el producto al carrito, llama a la acción correspondiente del controlador -->
                        </div>
                    </div>
                </div>
            <?php endforeach; ?> <!-- Fin del bucle foreach -->
        <?php else : ?> <!-- Si no hay productos disponibles -->
            <div class="col-12"> 
                <div class="alert alert-info text-center">
                    No hay productos disponibles
                </div> 
            </div>
        <?php endif; ?> 
    </div>
</div>

<!-- Incluye los scripts de Bootstrap para funcionalidades interactivas como menús desplegables -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>