<div class="container mt-4">
   
    <div class="d-flex justify-content-between align-items-center mb-4">
   
        <h2 class="text-primary">Administración de Productos</h2>

        <a href="index.php?controller=ProductosController&action=formNuevoProducto" class="btn btn-warning text-dark">
            <!-- Botón amarillo para añadir producto, enlaza al formulario -->
            <i class="fas fa-plus me-2"></i> Añadir Nuevo Producto
           
        </a>
    </div>

    <?php if (isset($_SESSION['mensaje'])): ?>
        <!-- Comprueba si hay mensaje de confirmación en la sesión -->
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
         
            <i class="fas fa-check-circle me-2"></i>
          
            <?php 
                echo $_SESSION['mensaje']; // Muestra el mensaje
                unset($_SESSION['mensaje']); // Lo elimina para no mostrarlo de nuevo
            ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            
        </div>
    <?php endif; ?>

    <div class="card border-0 shadow-sm">
    
        <div class="card-body p-0">
      
            <div class="table-responsive">
            
                <table class="table table-striped table-hover align-middle mb-0">
                
                    <thead class="bg-primary text-white">
           
                        <tr>
                            <th class="py-3">ID</th>
                            <th class="py-3">Foto</th>
                            <th class="py-3">Nombre</th>
                            <th class="py-3">Precio</th>
                        </tr>
                    </thead>
                    <tbody>
                   
                        <?php foreach ($data as $producto) : ?>
                            <!-- Recorre cada producto en $data -->
                            <tr>
                                <td><?= $producto->id_producto ?></td>
                                <!-- Muestra el ID del producto -->
                                <td>
                                    <img src="<?= htmlspecialchars($producto->foto) ?>" alt="Imagen de <?= htmlspecialchars($producto->nombre) ?>" 
                                         class="img-fluid rounded" style="width: 80px; height: 80px; object-fit: contain;">
                                    <!-- Muestra la imagen del producto con tamaño fijo y adaptación del contenido -->
                                </td>
                                <td class="fw-bold"><?= htmlspecialchars($producto->nombre) ?></td>
                                <!-- Nombre del producto en negrita -->
                                <td class="fw-bold text-warning"><?= number_format($producto->precio, 2) ?>€</td>
                                <!-- Precio formateado con 2 decimales, en color amarillo -->
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>