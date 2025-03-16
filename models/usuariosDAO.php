<?php

include_once('./db/database.php');

class UsuariosDAO {

    public function verificarUsuario($nombre, $password) {
        try {
            $dbh = Database::open_connection();
            $stmt = $dbh->prepare(
                'SELECT * FROM usuarios1 WHERE nombre = :nombre AND contrasenia = :password'
            );
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':password', $password);
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            $stmt->execute();

            $usuario = $stmt->fetch();
            return $usuario ? $usuario : false;

        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}
?>
