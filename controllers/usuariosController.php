<?php

include('./models/usuariosDAO.php');
include('./views/view.php');
class UsuariosController
{

    // Creamos action para mostrar el formulario de añadir usuarios

    public function showAddUserForm()
    {
        View::show('addUser.php', null);
    }

    // Action para añadir un usuario

    
}





?>