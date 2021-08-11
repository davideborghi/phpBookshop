<?php
require (PROJECT_PATH.'/models/autore.php');

class AutoreService{
    
        
    function __constructor(){
        
        
    }
    
    function getAllAutori(){
        require_once (PROJECT_PATH.'services/dbConnection.php');
        $connection = openConnection();
        $sql = "SELECT * FROM AUTORI";
        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            require_once (PROJECT_PATH.'models/autore.php');
            $autori = [];
            while ($row = $result->fetch_assoc()){
                $autori[]=new Autore($row["id"],$row["nome"], $row["urlfotoautore"]);
            }
            return $autori;
          }
        else {
        }
    }
    function getAutoriOfLibro($idLibro){
        
        require_once (PROJECT_PATH.'services/dbConnection.php');
        $connection = openConnection();
        $sql = "SELECT * FROM AUTORI autori INNER JOIN REL_LIBRO_AUTORE rel on rel.idautore=autori.id WHERE rel.idLibro=$idLibro";
        //echo $sql;
        $result = $connection->query($sql);
        //echo $result;
        if ($result->num_rows > 0) {
            // output data of each row
            require_once (PROJECT_PATH.'models/libro.php');
            $autori = [];
            while ($row = $result->fetch_assoc()){
                $autori[]=new Autore($row["id"],$row["nome"], $row["urlfotoautore"]);
            }
            return $autori;
        }
    }

}
?>