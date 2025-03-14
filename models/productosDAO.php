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

            

        

   
    }






?>