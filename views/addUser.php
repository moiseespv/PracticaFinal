<div class="container mt-5">

    <div class="row justify-content-center">
       
        <div class="col-md-6">
       
            <div class="card border-0 shadow-sm">
             
                <div class="card-header bg-primary text-white py-3">
               
                    <h4 class="mb-0 text-center">Iniciar Sesión</h4>
                  
                </div>
                <div class="card-body bg-white p-4">
                   
                    <?php if (isset($_SESSION['error_login'])): ?>
                        <!-- Comprueba si existe mensaje de error de login en la sesión -->
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <!-- Alerta roja con botón para cerrarla -->
                            <i class="fas fa-exclamation-circle me-2"></i>
                            <!-- Icono de advertencia -->
                            <?php 
                                echo $_SESSION['error_login']; // Muestra el mensaje de error
                                unset($_SESSION['error_login']); // Elimina el mensaje para no mostrarlo de nuevo
                            ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <!-- Botón X para cerrar la alerta -->
                        </div>
                    <?php endif; ?>

                    <form action="index.php?controller=UsuariosController&action=UsuarioIniciado" method="POST">
                        <!-- Formulario que envía datos al controlador UsuariosController, método UsuarioIniciado -->
                        <div class="form-floating mb-4">
                            
                            <input type="text" class="form-control form-control-lg" id="usuario" name="usuario" placeholder="Usuario" required>
                           
                            <label for="usuario">Usuario</label>
                          
                        </div>
                        <div class="form-floating mb-4">
                          
                            <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Contraseña" required>
                           
                            <label for="password">Contraseña</label>
                          
                        </div>
                        <div class="d-grid gap-2">
                           
                            <button type="submit" class="btn btn-warning btn-lg text-dark">
                               
                                <i class="fas fa-sign-in-alt me-2"></i>Iniciar Sesión
                             
                            </button>
                        </div>
                        <div class="text-center mt-3">
                          
                            <a href="index.php" class="text-primary">Volver a la tienda</a>
                           
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>