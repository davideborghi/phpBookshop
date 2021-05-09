<?php

 class UtenteService{
    
    function login($email, $password){
        //require (PROJECT_PATH.'/moks/userMock.php');
        require_once (PROJECT_PATH.'services/dbConnection.php');
        $connection = openConnection();
        $query = "SELECT * FROM UTENTI WHERE EMAIL='".$email."' AND PASSWORD = '".$password."'";
        $result = $connection->query($query);
        if ($result->num_rows > 0) {
            // output data of each row
            require_once (PROJECT_PATH.'models/utente.php');
            $row = $result->fetch_assoc();
            
            return new Utente($row["nome"], $row["cognome"], $row["email"], '');
          }
        else {
            return "Login_FAILED";
        }
    }
    function checkLogin(){

    }
    function logout(){
        $_SESSION['CURRENT_USER'] = null;
    }
}

?>