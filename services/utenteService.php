<?php

 class UtenteService{
    
    function login($email, $password){
        //require (PROJECT_PATH.'/moks/userMock.php');
        require_once (PROJECT_PATH.'services/dbConnection.php');
        $connection = openConnection();
        $sql = "SELECT * FROM UTENTI WHERE EMAIL='".$email."' AND PASSWORD = '".$password."'";
        $result = $connection->query($sql);
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
        require_once (PROJECT_PATH.'services/dbConnection.php');
        $connection = openConnection();
        $sql = "UPDATE UTENTI SET EMAIL = '$nuovaEmail', NOME='$nome', COGNOME = '$cognome' where email = '$vecchiaEmail'";
        echo $sql;
        return $connection->query($sql);
    }
    function checkLogin(){

    }
    function logout(){
        $_SESSION['CURRENT_USER'] = null;
    }
}

?>