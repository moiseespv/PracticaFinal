<?php

include('./db/database.php');
class ProductosDAO
{
    
        private $dbh;
        public function __construct(){
            $this->dbh = Database::open_connection();
        }
    
        
    
        public function getAllProducts()
        {
    
            try {
    
                $stmt =$this-> dbh->prepare("SELECT * FROM productos");
    
                $stmt->setFetchMode(PDO::FETCH_OBJ);
    
                $stmt->execute();
    
                return $stmt->fetchAll();
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
    
    
        }

        public function getAllProductsId($id){

            try {
               
            $dbh=Database::open_connection();
            
            $stmt= $dbh->prepare('SELECT * FROM productos WHERE id_producto like :id');
    
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            
            $stmt->execute();
            
            return $stmt->fetchAll();
            
            } catch (PDOException $e) {
                 echo $e->getMessage();
            }
                    
            }

            public function insertarProducto($nombre, $precio, $descripcion, $foto, $descripcion2) {
                try {
                    $dbh = Database::open_connection();
                    $stmt = $dbh->prepare('INSERT INTO productos (nombre, precio, descripcion, foto, descripcion2) VALUES (:nombre, :precio, :descripcion, :foto, :descripcion2)');
                    $stmt->bindParam(':nombre', $nombre);
                    $stmt->bindParam(':precio', $precio);
                    $stmt->bindParam(':descripcion', $descripcion);
                    $stmt->bindParam(':foto', $foto);
                    
                    return $stmt->execute();
                } catch (PDOException $e) {
                    echo $e->getMessage();
                    return false;
                }
            }
        
            public function eliminarProducto($id) {
                try {
                    $dbh = Database::open_connection();
                    $stmt = $dbh->prepare('DELETE FROM productos WHERE id_producto = :id');
                    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                    return $stmt->execute();
                } catch (PDOException $e) {
                    echo $e->getMessage();
                    return false;
                }
            }

            

        

   
    }






?>