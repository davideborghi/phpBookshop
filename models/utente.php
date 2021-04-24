<?php
class Utente{
    public $nome;
    public $cognome;
    public $email;
    public $password;

    public function __construct($nome,$cognome,$email,$password){
        $this->nome = $nome;
        $this->cognome = $cognome;
        $this->email = $email;
        $this->password = $password;
        
    }

}   
?>