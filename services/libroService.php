<?php
require (PROJECT_PATH.'/models/libro.php');

class LibroService{
    
        
    function __constructor(){
        
        
    }
    function buildLibroFromDbRow($row){
        return new Libro($row["id"],$row["titolo"], $row["editore"], $row["urlanteprimacopertina"]);
    }
    function getAllLibri(){
        require_once (PROJECT_PATH.'services/dbConnection.php');
        $connection = openConnection();
        $sql = "SELECT * FROM LIBRI";
        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            require_once (PROJECT_PATH.'models/libro.php');
            $libri = [];
            while ($row = $result->fetch_assoc()){
                $libri[]=$this->buildLibroFromDbRow($row);
            }
            return $libri;
            
            
          }
    }
    function getById($id){
        require_once (PROJECT_PATH.'services/dbConnection.php');
        $connection = openConnection();
        $sql = "SELECT * FROM LIBRI WHERE ID='$id'";
        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            require_once (PROJECT_PATH.'models/libro.php');
            
            while ($row = $result->fetch_assoc()){
                echo var_dump($row);
                $libro=$this->buildLibroFromDbRow($row);
            }
            return $libro;
        }
    }
    function getLibriByAutore($idAutore){
        
        require_once (PROJECT_PATH.'services/dbConnection.php');
        $connection = openConnection();
        $sql = "SELECT * FROM LIBRI libro INNER JOIN REL_LIBRO_AUTORE rel on rel.idlibro=libro.id WHERE rel.idautore=$idAutore";
        //echo $sql;
        $result = $connection->query($sql);
        //echo $result;
        if ($result->num_rows > 0) {
            // output data of each row
            require_once (PROJECT_PATH.'models/libro.php');
            $libri = [];
            while ($row = $result->fetch_assoc()){
                $libri[]=$this->buildLibroFromDbRow($row);
            }
            return $libri;
        }
    }
}
?>