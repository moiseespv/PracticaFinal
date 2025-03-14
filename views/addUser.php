<!--
    Vista para añadir nuevos productos. Contiene el código HTML con el formulario así como el código PHP para
    mostrar errores de validación, en caso de existir.
-->
<div class="container"> 
   <h5>Introduce los datos del usuario:</h5>

    <form class="form" action="index.php?controller=UsuariosController&action=showAddUserForm" method="post">
        <div class="form-group">
            <label class="form-label" for="usuario">Usuario:</label>
            <input class="form-control" type="text" name="usuario" id="usuario" maxlength="50" value="" required><br>
            <?php
                if (isset($data) && isset($data['usuario']))
                echo "<div class='alert alert-danger'>"
                       .htmlspecialchars($data['usuario']).
                      "</div>";
            ?>
        </div>
        <div class="form-group">
            <label class="form-label" for="password">Contraseña:</label>
            <input class="form-control" type="password" name="password" id="password" required><br>
            <?php
                if (isset($data) && isset($data['password']))
                echo "<div class='alert alert-danger'>"
                       .htmlspecialchars($data['password']).
                      "</div>";
            ?>
        </div>

        <!-- CSRF Protection -->
        <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token'] ?? ''); ?>">

        <div class="form-group">
            <input class="btn btn-primary" type="submit" name="insertar" value="Enviar">
        </div>
        
    </form>
</div>