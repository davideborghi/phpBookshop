<?php

require_once(PROJECT_PATH.'models/utente.php');
$listaUtenti = [];
$listaUtenti[]=new Utente('davide', 'borghi', 'davide@borghi.it','db');
$listaUtenti[]=new Utente('maria', 'bevacqua', 'maria@bevacqua.it','mb');
?>