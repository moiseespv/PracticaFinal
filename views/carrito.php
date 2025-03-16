<div class="container mt-4">
   
    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2 class="text-primary">Tu Carrito de Compra</h2>
    
        <a href="index.php" class="btn btn-primary">
    
            <i class="fas fa-arrow-left me-2"></i>Seguir Comprando
         
        </a>
    </div>
    
    <?php if (empty($data)): ?>
        <!-- Comprueba si el carrito está vacío -->
        <div class="alert alert-warning shadow-sm" role="alert">
          
            <i class="fas fa-exclamation-triangle me-2"></i>
       
            Tu carrito está vacío. ¡Añade productos para empezar a comprar!
           
        </div>
        <div class="text-center mt-4">
        
            <a href="index.php" class="btn btn-warning text-dark btn-lg">
              
                <i class="fas fa-shopping-cart me-2"></i>Ver Productos
               
            </a>
        </div>
    <?php else: ?>
        <!-- Si hay productos en el carrito -->
        <div class="card border-0 shadow-sm mb-4">
           
            <div class="card-body p-0">
               
                <div class="table-responsive">
               
                    <table class="table table-striped table-hover align-middle mb-0">
                   
                        <thead class="bg-primary text-white">
                       
                            <tr>
                                <th class="py-3">Producto</th>
                                <th class="py-3 text-end">Precio</th>
                              
                            </tr>
                        </thead>
                        <tbody>
                   
                            <?php foreach ($data as $producto): ?>
                                <!-- Recorre cada producto en el carrito -->
                                <tr>
                                    <td class="fw-bold"><?= htmlspecialchars($producto->nombre) ?></td>
                                    <!-- Nombre del producto en negrita -->
                                    <td class="text-warning fw-bold text-end"><?= number_format($producto->precio, 2) ?>€</td>
                                    <!-- Precio formateado con 2 decimales, en color amarillo y alineado a la derecha -->
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        <div class="card border-0 shadow-sm bg-light">
       
            <div class="card-body">
            
                <div class="row align-items-center">
                    
                    <div class="col-md-6">
                     
                        <div class="d-flex gap-2">
                          
                            <a href="index.php" class="btn btn-primary">
                                
                                <i class="fas fa-arrow-left me-1"></i> Seguir Comprando
                               
                            </a>
                            <a href="index.php?controller=UsuariosController&action=FinalizarCompra" class="btn btn-warning text-dark">
                                
                                <i class="fas fa-check-circle me-1"></i> Finalizar Compra
                                
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 text-end">
                    
                        <div class="fs-4 fw-bold">
                           
                            Total: 
                            <span class="text-warning">
                               
                                <?php
                                    $total = 0;
                                    foreach ($data as $producto) {
                                        $total += $producto->precio; // Suma los precios
                                    }
                                    echo number_format($total, 2) . "€"; // Muestra el total formateado
                                ?>
                            </span>
                        </div>
                        <div class="text-muted small">IVA incluido</div>
                       
                    </div>
                </div>
            </div>
        </div>
        
        <?php if (isset($_SESSION['mensaje'])): ?>
            <!-- Comprueba si hay mensaje de confirmación en la sesión -->
            <div class="alert alert-success mt-3 shadow-sm">
               
                <i class="fas fa-check-circle me-2"></i>
                
                <?php echo $_SESSION['mensaje']; ?>
                <!-- Muestra el mensaje -->
                <?php unset($_SESSION['mensaje']); ?>
                <!-- Lo elimina para no mostrarlo de nuevo -->
            </div>
        <?php endif; ?>
    <?php endif; ?>
</div>