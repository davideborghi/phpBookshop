<?php

class Libro{
    public $id;
    public $titolo;
    public $editore;
    public $urlAnteprimaCopertina;


    public function __construct($id, $titolo, $editore, $urlAnteprimaCopertina){
        $this->id = $id;
        $this->titolo = $titolo;
        $this->editore = $editore;
        $this->urlAnteprimaCopertina = $urlAnteprimaCopertina;
    }
}