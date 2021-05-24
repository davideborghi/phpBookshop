<?php

 class UtenteService{
     private $connection;

     function __constructor(){
        require_once (PROJECT_PATH.'services/dbConnection.php');
        $this->connection = openConnection();
        
    }
    function getConnection(){
        
    }
    function login($email, $password){
        //require (PROJECT_PATH.'/moks/userMock.php');
        
        $sql = "SELECT * FROM UTENTI WHERE EMAIL='".$email."' AND PASSWORD = '".$password."'";
        $result = $this->connection->query($sql);
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
    function aggiornaUtente($vecchiaEmail, $nuovaEmail, $nome, $cognome){
        
        $sql = "UPDATE UTENTI SET EMAIL = '$nuovaEmail', NOME='$nome', COGNOME = '$cognome' where email = '$vecchiaEmail'";
        echo $sql;
        return $this->connection->query($sql);
    }
    function checkLogin(){

    }
    function logout(){
        $_SESSION['CURRENT_USER'] = null;
    }
    function nomeUtenteDisponibile($email){
        require_once (PROJECT_PATH.'services/dbConnection.php');
        $connection = openConnection();
        $sql = "SELECT * FROM UTENTI WHERE EMAIL = '$email'";
        $result = $connection->query($sql);        
        if ($result->num_rows == 0){
            echo "OK";
        }
        else{            
            echo "KO";
        }
        
    }
}

?>