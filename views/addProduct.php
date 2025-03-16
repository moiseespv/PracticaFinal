<div class="container mt-4">
    
    <div class="row justify-content-center">

        <div class="col-md-8">
            
            <div class="card border-0 shadow-sm">
                
                <div class="card-header bg-primary text-white">
                    
                    <h4 class="mb-0">Añadir Nuevo Producto</h4>
                    
                </div>
                <div class="card-body bg-white">
                   
                    <form action="index.php?controller=ProductosController&action=guardarProducto" method="POST">
                        <!-- Formulario que envía datos al controlador ProductosController, método guardarProducto -->
                        <div class="mb-3">
                           
                            <label for="nombre" class="form-label fw-bold">Nombre del Producto</label>
                            
                            <input type="text" class="form-control form-control-lg" id="nombre" name="nombre" required>
                            
                        </div>
                        
                        <div class="mb-3">
                           
                            <label for="precio" class="form-label fw-bold">Precio (€)</label>
                           
                            <div class="input-group">
                               
                                <input type="number" class="form-control form-control-lg" id="precio" name="precio" step="0.01" min="0" required>
                                <!-- Campo numérico para el precio, con dos decimales y valor mínimo 0 -->
                                <span class="input-group-text bg-warning text-dark">€</span>
                                
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            
                            <label for="descripcion" class="form-label fw-bold">Descripción</label>
                            
                            <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
                            
                        </div>
                        
                        <div class="mb-3">
                            
                            <label for="foto" class="form-label fw-bold">URL de la Imagen</label>
                           
                            <input type="text" class="form-control" id="foto" name="foto" required>
                           
                        </div>

                        <div class="mb-3">
                          
                            <label for="descripcion2" class="form-label fw-bold">Descripción Técnica</label>
                            
                            <textarea class="form-control" id="descripcion2" name="descripcion2" rows="3" required></textarea>
                            
                        </div>
                        
                        <div class="d-flex justify-content-between mt-4">
                          
                            <a href="index.php?controller=ProductosController&action=listarAdmin" class="btn btn-secondary btn-lg">
                                <!-- Botón grande gris para cancelar, enlaza a la lista de administración -->
                                <i class="fas fa-times"></i> Cancelar
                                
                            </a>
                            <button type="submit" class="btn btn-warning btn-lg text-dark">
                              
                                <i class="fas fa-save"></i> Guardar Producto
                              
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>