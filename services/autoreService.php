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
                echo var_dump($row);
                $autori[]=new Autore($row["id"],$row["nome"], $row["urlfotoautore"]);
            }
            return $autori;
            
            //return new Utente($row["nome"], $row["cognome"], $row["email"], '');
          }
        else {
            //return "Login_FAILED";
        }
    }

}
?>