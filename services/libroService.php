<?php
require (PROJECT_PATH.'/models/libro.php');

class LibroService{
    
        
    function __constructor(){
        
        
    }
    
    function getAllLibri(){
        require (PROJECT_PATH.'/moks/libriMock.php');
        return $listaLibri;
    }
    function getById($id){
        require (PROJECT_PATH.'/moks/libriMock.php');
        foreach($listaLibri as $myLibro){
            if ($myLibro->id == $id){
                return $myLibro;
            }
        }
        return 'not found';
    }
}
?>