<?php

class Libro{
    public $id;
    public $titolo;
    public $editore;
    public $urlAnteprimaCopertina;
    public $autori;


    public function __construct($id, $titolo, $editore, $urlAnteprimaCopertina){
        $this->id = $id;
        $this->titolo = $titolo;
        $this->editore = $editore;
        $this->urlAnteprimaCopertina = $urlAnteprimaCopertina;
    }
    public function isAutore($idAutore){
        foreach($this->autori as $autore){
             if($autore->id == $idAutore){
                 return true;
             }
        }
        return false;
    }
}