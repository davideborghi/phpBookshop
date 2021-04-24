<?php

 class UtenteService{
    
    function login($email, $password){
        require (PROJECT_PATH.'/moks/userMock.php');
        $_SESSION['CURRENT_USER'] = $listaUtenti[0];
    }
    function checkLogin(){

    }
    function logout(){
        $_SESSION['CURRENT_USER'] = null;
    }
}

?>