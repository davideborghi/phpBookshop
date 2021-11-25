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
    function upsertAutore($id, $nome, $urlFoto){
        require_once (PROJECT_PATH.'services/dbConnection.php');
        if($id != 0){
            $connection = openConnection();
            $sql ="UPDATE AUTORI SET nome = '$nome', urlfotoautore = '$urlFoto' where id = $id";
            
            return $connection->query($sql);
        }
        else{
            $connection = openConnection();
            $sql ="INSERT INTO AUTORI (nome,urlfotoautore) VALUES ('$nome','$urlFoto')";
            return $connection->query($sql);
        }
    
    }
    function getById($id){
        require_once (PROJECT_PATH.'services/dbConnection.php');
        $connection = openConnection();
        $sql = "SELECT * FROM AUTORI WHERE ID='$id'";
        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            require_once (PROJECT_PATH.'models/autore.php');
            
            while ($row = $result->fetch_assoc()){
                $autore=new Autore($row["id"],$row["nome"], $row["urlfotoautore"]);
            }
            return $autore;
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