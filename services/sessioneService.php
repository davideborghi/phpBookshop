<?php
require_once (PROJECT_PATH.'models/utente.php');
session_start();

if (isset($_SESSION['CURRENT_USER'])){
    $user = $_SESSION['CURRENT_USER'];
    
}
function logout(){
    echo 'LOGOUT';
    session_destroy();
}
?>