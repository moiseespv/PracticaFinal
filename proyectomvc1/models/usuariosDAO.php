<?php

include('./db/database.php');
class UsuarioDAO
{

    private $dbh;
    public function __construct()
    {
        $this->dbh = Database::open_connection();
    }

    /* 
        Recupera todos los usuarios de la base de datos
        Parámetros: no tiene
        Retorna: array con objetos de usuario.
    */

    public function getAllUsers()
    {

        try {

            $stmt =$this-> dbh->prepare("SELECT * FROM usuarios1");

            $stmt->setFetchMode(PDO::FETCH_OBJ);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }


    }

    public function checkUserExists($nombre, $password)
    {
        try {
            $stmt = $this->dbh->prepare("SELECT * FROM usuarios1 WHERE nombre = :nombre AND 'password' = :'password'");
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':password', $password);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_OBJ) !== false;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

}





?>